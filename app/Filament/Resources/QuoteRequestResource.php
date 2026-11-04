<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuoteRequestResource\Pages;
use App\Models\QuoteRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class QuoteRequestResource extends Resource
{
    protected static ?string $model = QuoteRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';
    protected static ?string $navigationGroup = 'Gestión Comercial';
    protected static ?string $modelLabel = 'Cotización B2B';
    protected static ?string $pluralModelLabel = 'Solicitudes de Cotización';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Información del Prospecto')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('folio')
                            ->disabled()
                            ->dehydrated(false),
                        Forms\Components\Select::make('status')
                            ->label('Estado del Requerimiento')
                            ->options([
                                'nuevo' => 'Nuevo Lead',
                                'contactado' => 'Contactado',
                                'en_cotizacion' => 'En Cotización',
                                'ganado' => 'Ganado / Cerrado',
                                'archivado' => 'Archivado',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('full_name')
                            ->label('Nombre Completo')
                            ->required(),
                        Forms\Components\TextInput::make('company')
                            ->label('Empresa')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->label('Correo Electrónico')
                            ->email()
                            ->required(),
                        Forms\Components\TextInput::make('phone')
                            ->label('Teléfono / WhatsApp')
                            ->tel()
                            ->required(),
                        Forms\Components\TextInput::make('role')
                            ->label('Cargo / Puesto (EHS, Compras, etc.)'),
                        Forms\Components\Select::make('service_type')
                            ->label('Servicio Solicitado')
                            ->options([
                                'calibracion_iso17025' => 'Calibración Acreditada ISO 17025 (ES Labs)',
                                'renta_detectores' => 'Renta de Detectores de Gas Conectados',
                                'equipos_fijos_portatiles' => 'Venta de Detectores Fijos / Portátiles',
                                'lentes_prescripcion' => 'Lentes de Seguridad Graduados (Armourx)',
                                'optica_movil' => 'Óptica Móvil Enjoy Vision In-Situ',
                                'campana_salud_visual' => 'Campaña de Salud Visual para Empresas',
                            ])
                            ->required(),
                    ]),

                Forms\Components\Section::make('Detalles del Proyecto y Notas')
                    ->schema([
                        Forms\Components\TextInput::make('equipment_interest')
                            ->label('Equipos o Cantidad de Interés'),
                        Forms\Components\Textarea::make('details')
                            ->label('Mensaje / Requerimiento del Cliente')
                            ->rows(4),
                        Forms\Components\Textarea::make('notes')
                            ->label('Notas Internas de Seguimiento Comercial')
                            ->placeholder('Ej. Se cotizó con flete a Monterrey. Próxima llamada el jueves.')
                            ->rows(3),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('folio')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Contacto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company')
                    ->label('Empresa')
                    ->searchable()
                    ->weight('medium'),
                Tables\Columns\TextColumn::make('service_type')
                    ->label('Servicio')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'calibracion_iso17025' => 'Calibración ISO 17025',
                        'renta_detectores' => 'Renta Detectores',
                        'equipos_fijos_portatiles' => 'Venta Detectores',
                        'lentes_prescripcion' => 'Lentes de Seguridad',
                        'optica_movil' => 'Óptica Móvil',
                        'campana_salud_visual' => 'Campaña Visual',
                        default => $state,
                    })
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'nuevo' => 'danger',
                        'contactado' => 'warning',
                        'en_cotizacion' => 'info',
                        'ganado' => 'success',
                        'archivado' => 'gray',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'nuevo' => 'Nuevo',
                        'contactado' => 'Contactado',
                        'en_cotizacion' => 'En Cotización',
                        'ganado' => 'Ganado',
                        'archivado' => 'Archivado',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Teléfono')
                    ->searchable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Filtrar por Estado')
                    ->options([
                        'nuevo' => 'Nuevo',
                        'contactado' => 'Contactado',
                        'en_cotizacion' => 'En Cotización',
                        'ganado' => 'Ganado',
                        'archivado' => 'Archivado',
                    ]),
                Tables\Filters\SelectFilter::make('service_type')
                    ->label('Filtrar por Servicio')
                    ->options([
                        'calibracion_iso17025' => 'Calibración ISO 17025',
                        'renta_detectores' => 'Renta Detectores',
                        'equipos_fijos_portatiles' => 'Venta Detectores',
                        'lentes_prescripcion' => 'Lentes de Seguridad',
                        'optica_movil' => 'Óptica Móvil',
                        'campana_salud_visual' => 'Campaña Visual',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuoteRequests::route('/'),
            'create' => Pages\CreateQuoteRequest::route('/create'),
            'edit' => Pages\EditQuoteRequest::route('/{record}/edit'),
        ];
    }
}
