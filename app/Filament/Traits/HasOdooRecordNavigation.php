<?php

namespace App\Filament\Traits;

use App\Models\QuoteRequest;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Facades\FilamentView;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

trait HasOdooRecordNavigation
{
    protected bool $wasRecordDirtyBeforeNavigation = false;

    public function getOdooRecordNavigationAction(): Action
    {
        return Action::make('odooRecordNavigation')
            ->view('filament.components.odoo-record-navigation');
    }

    public function getRecordNavigationQuery(): Builder
    {
        $resource = static::getResource();
        $modelClass = $resource::getModel();
        $query = $modelClass::query();

        if (method_exists($this, 'getRecordNavigationSort')) {
            [$column, $direction] = $this->getRecordNavigationSort();

            return $query->orderBy($column, $direction)->orderBy($this->getRecord()->getKeyName(), 'asc');
        }

        $schema = Schema::getColumnListing((new $modelClass)->getTable());
        if (in_array('order', $schema, true)) {
            return $query->orderBy('order', 'asc')->orderBy($this->getRecord()->getKeyName(), 'asc');
        }

        if ($modelClass === QuoteRequest::class) {
            return $query->orderBy('created_at', 'desc')->orderBy($this->getRecord()->getKeyName(), 'desc');
        }

        return $query->orderBy($this->getRecord()->getKeyName(), 'asc');
    }

    public function getRecordNavigationIds(): array
    {
        return $this->getRecordNavigationQuery()
            ->pluck($this->getRecord()->getKeyName())
            ->map(fn ($id) => (string) $id)
            ->all();
    }

    public function getRecordNavigationInfo(): ?array
    {
        $record = $this->getRecord();
        if (! $record) {
            return null;
        }

        $recordKey = (string) $record->getKey();
        $ids = $this->getRecordNavigationIds();
        $total = count($ids);

        if ($total === 0) {
            return null;
        }

        $currentIndex = array_search($recordKey, $ids, true);
        if ($currentIndex === false) {
            return [
                'current' => 1,
                'total' => $total,
                'hasPrevious' => false,
                'hasNext' => false,
                'previousId' => null,
                'nextId' => null,
            ];
        }

        $hasPrevious = $currentIndex > 0;
        $hasNext = $currentIndex < ($total - 1);

        return [
            'current' => $currentIndex + 1,
            'total' => $total,
            'hasPrevious' => $hasPrevious,
            'hasNext' => $hasNext,
            'previousId' => $hasPrevious ? $ids[$currentIndex - 1] : null,
            'nextId' => $hasNext ? $ids[$currentIndex + 1] : null,
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->fill($data);
        $this->wasRecordDirtyBeforeNavigation = $record->isDirty();
        $record->save();

        return $record;
    }

    public function navigateToPreviousRecord(): void
    {
        $info = $this->getRecordNavigationInfo();
        if (! $info || ! $info['hasPrevious']) {
            return;
        }

        $this->navigateToRecord($info['previousId']);
    }

    public function navigateToNextRecord(): void
    {
        $info = $this->getRecordNavigationInfo();
        if (! $info || ! $info['hasNext']) {
            return;
        }

        $this->navigateToRecord($info['nextId']);
    }

    protected function navigateToRecord(string|int $targetRecordId): void
    {
        // Apply any pending changes on the current record before navigation
        $this->save(shouldRedirect: false, shouldSendSavedNotification: false);

        if ($this->wasRecordDirtyBeforeNavigation) {
            Notification::make()
                ->title('Cambios guardados en el registro')
                ->success()
                ->send();
        }

        $url = static::getResource()::getUrl('edit', ['record' => $targetRecordId]);
        $this->redirect($url, navigate: FilamentView::hasSpaMode($url));
    }
}
