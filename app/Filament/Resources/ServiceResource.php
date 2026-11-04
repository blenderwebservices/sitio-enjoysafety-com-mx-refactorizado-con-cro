<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    protected static ?string $navigationGroup = 'Servicios y Soluciones';
    protected static ?string $modelLabel = 'Solución';
    protected static ?string $pluralModelLabel = 'Servicios Especializados';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Información del Servicio')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nombre del Servicio')
                            ->required(),
                        Forms\Components\Select::make('division')
                            ->label('División Comercial')
                            ->options([
                                'Enjoy Safety' => 'Enjoy Safety (Detección & Renta)',
                                'ES Labs' => 'ES Labs (Laboratorio ISO 17025)',
                                'Enjoy Vision' => 'Enjoy Vision (Salud Visual & Óptica Móvil)',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('tagline')
                            ->label('Lema / Propuesta de Valor')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('image_path')
                            ->label('Imagen Representativa'),
                        Forms\Components\TextInput::make('icon')
                            ->label('Identificador de Ícono'),
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Activo')
                            ->default(true),
                    ]),

                Forms\Components\Section::make('Detalles y Características')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->label('Descripción Detallada')
                            ->rows(4)
                            ->required(),
                        Forms\Components\TagsInput::make('features')
                            ->label('Características Principales (Lista)')
                            ->placeholder('Presiona enter para agregar'),
                        Forms\Components\TagsInput::make('target_industries')
                            ->label('Industrias Objetivo')
                            ->placeholder('Ej. Petroquímica, Minería...'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Servicio')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('division')
                    ->label('División')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'ES Labs' => 'success',
                        'Enjoy Vision' => 'info',
                        default => 'warning',
                    }),
                Tables\Columns\TextColumn::make('tagline')
                    ->label('Propuesta')
                    ->limit(40),
                Tables\Columns\TextColumn::make('order')
                    ->label('Orden')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),
            ])
            ->defaultSort('order', 'asc')
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
