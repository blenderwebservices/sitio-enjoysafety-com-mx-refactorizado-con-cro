@extends('layouts.app')

@section('title', 'Catálogo Industrial de Equipos y Tubos | Enjoy Safety México')
@section('meta_description', 'Detectores de gases portátiles, fijos, tubos colorimétricos KwikDraw de H2S y armazones de seguridad graduables Armourx con certificación oficial.')

@section('content')

<div class="bg-slate-900 text-white py-12 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <span class="text-xs font-bold uppercase tracking-widest text-amber-400">Portafolio Oficial</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold mt-1">Catálogo de Equipos y Protección Industrial</h1>
        <p class="text-slate-400 text-sm mt-2 max-w-2xl">
            Detectores de gas certificados, tubos colorimétricos de reacción inmediata y armazones graduados de alto impacto. Cotizaciones B2B por volumen y entrega inmediata en México.
        </p>
    </div>
</div>

<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter and Search Bar -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm mb-10">
            <form action="{{ route('catalog') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-4">
                <!-- Search text -->
                <div class="sm:col-span-5">
                    <label for="search" class="block text-xs font-bold text-slate-500 uppercase mb-1">Buscar por Modelo o Gas</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Ej. H2S, Blackline G7c, Armourx..." class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-amber-500 focus:outline-none">
                </div>

                <!-- Category filter -->
                <div class="sm:col-span-3">
                    <label for="category" class="block text-xs font-bold text-slate-500 uppercase mb-1">Categoría</label>
                    <select name="category" id="category" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-amber-500 focus:outline-none">
                        <option value="">Todas las categorías</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->slug }}" {{ request('category') === $cat->slug ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Brand filter -->
                <div class="sm:col-span-2">
                    <label for="brand" class="block text-xs font-bold text-slate-500 uppercase mb-1">Marca</label>
                    <select name="brand" id="brand" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-amber-500 focus:outline-none">
                        <option value="">Todas</option>
                        @foreach($brands as $b)
                            <option value="{{ $b->slug }}" {{ request('brand') === $b->slug ? 'selected' : '' }}>
                                {{ $b->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit / Clear -->
                <div class="sm:col-span-2 flex items-end gap-2">
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold text-sm shadow-sm transition">
                        Filtrar
                    </button>
                    @if(request()->anyFilled(['search', 'category', 'brand']))
                        <a href="{{ route('catalog') }}" class="p-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 transition" title="Limpiar filtros">
                            ✕
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Products Grid -->
        @if($products->isEmpty())
            <div class="bg-white p-12 text-center rounded-2xl border border-slate-200">
                <p class="text-slate-500 text-base">No se encontraron productos con los criterios seleccionados.</p>
                <a href="{{ route('catalog') }}" class="mt-4 inline-block px-5 py-2 rounded-lg bg-amber-500 text-slate-950 font-bold text-xs">Ver todo el catálogo</a>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $prod)
                    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-lg transition flex flex-col justify-between group">
                        <div class="p-6">
                            <!-- Image -->
                            <div class="h-48 bg-slate-50 rounded-xl overflow-hidden flex items-center justify-center p-4 mb-4">
                                <img src="{{ asset($prod->image_path) }}" alt="{{ $prod->name }}" class="max-h-full max-w-full object-contain group-hover:scale-105 transition duration-300">
                            </div>

                            <div class="flex items-center justify-between text-xs mb-2">
                                <span class="font-bold text-slate-400 uppercase tracking-wider">{{ $prod->brand->name ?? 'Fabricante' }}</span>
                                <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-600 font-medium text-[11px]">{{ $prod->category->name ?? 'General' }}</span>
                            </div>

                            <h2 class="text-lg font-bold text-slate-900 group-hover:text-amber-600 transition line-clamp-2">
                                {{ $prod->name }}
                            </h2>

                            @if($prod->sku)
                                <div class="text-[11px] text-slate-400 mt-1">SKU: {{ $prod->sku }}</div>
                            @endif

                            <p class="text-xs text-slate-600 mt-3 line-clamp-3 leading-relaxed">
                                {{ $prod->short_description }}
                            </p>

                            @if(!empty($prod->technical_specs))
                                <div class="mt-4 bg-slate-50 rounded-lg p-3 space-y-1 text-xs text-slate-600 border border-slate-100">
                                    @foreach(array_slice($prod->technical_specs, 0, 3) as $key => $val)
                                        <div><strong class="text-slate-800">{{ $key }}:</strong> {{ $val }}</div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <!-- Card Footer -->
                        <div class="p-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <div>
                                @if($prod->price)
                                    <div class="text-[10px] text-slate-400 uppercase font-semibold">Precio Referencial</div>
                                    <div class="text-base font-extrabold text-slate-900">MXN$ {{ number_format($prod->price, 2) }}</div>
                                @else
                                    <span class="inline-flex items-center text-xs font-semibold text-amber-700 bg-amber-50 px-2 py-0.5 rounded">
                                        Cotización por Proyecto
                                    </span>
                                @endif
                            </div>
                            <a href="{{ route('contact') }}?servicio=equipos_fijos_portatiles&equipo={{ urlencode($prod->name) }}" class="px-4 py-2 rounded-xl bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold text-xs shadow-sm transition">
                                Solicitar Cotización
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $products->links() }}
            </div>
        @endif

    </div>
</div>

@endsection
