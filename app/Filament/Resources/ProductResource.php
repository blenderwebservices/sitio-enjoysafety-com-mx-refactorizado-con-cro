<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Catálogo Industrial';
    protected static ?string $modelLabel = 'Producto / Equipo';
    protected static ?string $pluralModelLabel = 'Equipos y Productos';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Datos Principales')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nombre del Producto')
                            ->required(),
                        Forms\Components\TextInput::make('sku')
                            ->label('Código / SKU'),
                        Forms\Components\Select::make('brand_id')
                            ->label('Marca Fabricante')
                            ->relationship('brand', 'name')
                            ->searchable()
                            ->preload(),
                        Forms\Components\Select::make('category_id')
                            ->label('Categoría')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload(),
                        Forms\Components\TextInput::make('image_path')
                            ->label('Ruta de Imagen (ej: images/Equipos_Fijo.webp)'),
                        Forms\Components\TextInput::make('datasheet_url')
                            ->label('URL de Ficha Técnica (PDF)'),
                    ]),

                Forms\Components\Section::make('Precios y Estado')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('price')
                            ->label('Precio Referencial (MXN)')
                            ->numeric()
                            ->prefix('$'),
                        Forms\Components\Toggle::make('is_quote_only')
                            ->label('Solo Cotización B2B (Sin precio público)')
                            ->default(true),
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Destacado en Portada')
                            ->default(false),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Activo')
                            ->default(true),
                    ]),

                Forms\Components\Section::make('Descripciones y Especificaciones Técnicas')
                    ->schema([
                        Forms\Components\Textarea::make('short_description')
                            ->label('Descripción Breve')
                            ->rows(2),
                        Forms\Components\Textarea::make('full_description')
                            ->label('Descripción Completa')
                            ->rows(5),
                        Forms\Components\KeyValue::make('technical_specs')
                            ->label('Especificaciones Técnicas (Par clave => valor)')
                            ->keyLabel('Especificación')
                            ->valueLabel('Valor / Detalle'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Imagen')
                    ->disk('public'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Producto')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('brand.name')
                    ->label('Marca')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Categoría')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_quote_only')
                    ->label('Solo Cotizar')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Destacado')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('brand')
                    ->relationship('brand', 'name')
                    ->label('Marca'),
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name')
                    ->label('Categoría'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
