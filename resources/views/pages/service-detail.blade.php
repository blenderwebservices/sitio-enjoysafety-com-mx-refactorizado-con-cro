@extends('layouts.app')

@section('title', $service->name . ' | Enjoy Safety México')
@section('meta_description', $service->tagline . ' - ' . Str::limit(strip_tags($service->description), 150))

@section('content')

<!-- Service Header -->
<div class="bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white py-16 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold mb-4 {{ $service->division === 'ES Labs' ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30' : ($service->division === 'Enjoy Vision' ? 'bg-sky-500/20 text-sky-400 border border-sky-500/30' : 'bg-amber-500/20 text-amber-400 border border-amber-500/30') }}">
                División {{ $service->division }}
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">{{ $service->name }}</h1>
            <p class="text-base sm:text-xl text-slate-300 mt-3 font-medium">{{ $service->tagline }}</p>
        </div>
    </div>
</div>

<div class="py-16 bg-slate-50 dark:bg-slate-950 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left Main Content Column -->
            <div class="lg:col-span-8 space-y-10">
                <!-- Service Banner/Image -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 overflow-hidden p-6 shadow-sm flex items-center justify-center transition-colors duration-200">
                    <img src="{{ asset($service->image_path) }}" alt="{{ $service->name }}" class="max-h-80 w-auto object-contain">
                </div>

                <!-- Description -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-8 shadow-sm space-y-4 transition-colors duration-200">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Descripción del Servicio</h2>
                    <p class="text-slate-700 dark:text-slate-300 leading-relaxed text-base whitespace-pre-line">
                        {{ $service->description }}
                    </p>
                </div>

                <!-- Features & Technical Scope -->
                @if(!empty($service->features))
                    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-8 shadow-sm transition-colors duration-200">
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Alcance y Beneficios Clave</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($service->features as $feature)
                                <div class="flex items-start gap-3 p-4 bg-slate-50 dark:bg-slate-800/80 rounded-xl border border-slate-100 dark:border-slate-700/60">
                                    <div class="w-6 h-6 rounded-full bg-emerald-100 dark:bg-emerald-950 text-emerald-600 dark:text-emerald-400 flex items-center justify-center font-bold text-xs flex-shrink-0 mt-0.5">
                                        ✓
                                    </div>
                                    <span class="text-sm font-medium text-slate-800 dark:text-slate-200">{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Target Industries -->
                @if(!empty($service->target_industries))
                    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-8 shadow-sm transition-colors duration-200">
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Sectores Industriales Recomendados</h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach($service->target_industries as $ind)
                                <span class="px-3.5 py-1.5 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-800 dark:text-slate-200 text-sm font-semibold border border-slate-200 dark:border-slate-700">
                                    🏭 {{ $ind }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Right Sidebar / RFQ Lead Magnet -->
            <div class="lg:col-span-4 sticky top-28 space-y-6">
                <!-- Quick RFQ Form -->
                <div class="bg-slate-900 text-white rounded-2xl p-6 sm:p-8 shadow-xl border border-slate-800">
                    <h3 class="text-lg font-bold text-white mb-1">Cotizar {{ $service->name }}</h3>
                    <p class="text-xs text-slate-400 mb-6">Reciba propuesta técnica y económica formal en menos de 2 horas hábiles.</p>

                    <form action="{{ route('quote.submit') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="service_type" value="{{ $service->slug }}">

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-300 mb-1">Nombre Completo *</label>
                            <input type="text" name="full_name" required placeholder="Ing. Carlos Reyes" class="w-full px-3 py-2 rounded-lg bg-slate-800 border border-slate-700 text-white text-xs focus:ring-2 focus:ring-amber-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-300 mb-1">Empresa *</label>
                            <input type="text" name="company" required placeholder="Nombre de su empresa" class="w-full px-3 py-2 rounded-lg bg-slate-800 border border-slate-700 text-white text-xs focus:ring-2 focus:ring-amber-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-300 mb-1">Correo Electrónico *</label>
                            <input type="email" name="email" required placeholder="carlos@empresa.com" class="w-full px-3 py-2 rounded-lg bg-slate-800 border border-slate-700 text-white text-xs focus:ring-2 focus:ring-amber-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-300 mb-1">Teléfono / WhatsApp *</label>
                            <input type="tel" name="phone" required placeholder="55 1234 5678" class="w-full px-3 py-2 rounded-lg bg-slate-800 border border-slate-700 text-white text-xs focus:ring-2 focus:ring-amber-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-300 mb-1">Detalles de su Requerimiento</label>
                            <textarea name="details" rows="3" placeholder="Indique cantidad de equipos, colaboradores o fechas..." class="w-full px-3 py-2 rounded-lg bg-slate-800 border border-slate-700 text-white text-xs focus:ring-2 focus:ring-amber-500 focus:outline-none"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3 rounded-xl bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold text-xs shadow-md transition">
                            Solicitar Cotización Inmediata
                        </button>
                    </form>
                </div>

                <!-- Direct Help Card -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm transition-colors duration-200">
                    <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Asesoría Inmediata</div>
                    <div class="text-sm font-bold text-slate-800 dark:text-slate-100 mb-2">¿Necesita asistencia técnica telefónica?</div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-4">Nuestros ingenieros de soporte están disponibles de Lunes a Viernes de 8:00 a 18:00 hrs.</p>
                    <a href="tel:+525541697780" class="block text-center py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-800 dark:text-slate-200 font-bold text-xs transition">
                        📞 Llamar al +52 55 4169 7780
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
