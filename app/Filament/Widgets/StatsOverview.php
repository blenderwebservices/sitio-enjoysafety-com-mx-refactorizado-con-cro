<?php

namespace App\Filament\Widgets;

use App\Models\Brand;
use App\Models\Product;
use App\Models\QuoteRequest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $newQuotes = QuoteRequest::where('status', 'nuevo')->count();
        $inProgress = QuoteRequest::whereIn('status', ['contactado', 'en_cotizacion'])->count();
        $totalProducts = Product::where('is_active', true)->count();
        $totalBrands = Brand::where('is_active', true)->count();

        return [
            Stat::make('Nuevos Leads (Sin Atender)', $newQuotes)
                ->description('Prioridad alta de respuesta < 2 hrs')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color($newQuotes > 0 ? 'danger' : 'success'),

            Stat::make('Cotizaciones en Proceso', $inProgress)
                ->description('Negociaciones activas')
                ->descriptionIcon('heroicon-m-arrow-path')
                ->color('info'),

            Stat::make('Equipos Activos', $totalProducts)
                ->description('Detectores, tubos y lentes')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary'),

            Stat::make('Marcas Aliadas', $totalBrands)
                ->description('Fabricantes internacionales')
                ->descriptionIcon('heroicon-m-tag')
                ->color('success'),
        ];
    }
}
