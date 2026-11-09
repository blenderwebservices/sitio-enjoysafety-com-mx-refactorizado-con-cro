<?php

namespace App\Filament\Resources\QuoteRequestResource\Pages;

use App\Filament\Resources\QuoteRequestResource;
use App\Filament\Traits\HasOdooRecordNavigation;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuoteRequest extends EditRecord
{
    use HasOdooRecordNavigation;

    protected static string $resource = QuoteRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            $this->getOdooRecordNavigationAction(),
        ];
    }
}
