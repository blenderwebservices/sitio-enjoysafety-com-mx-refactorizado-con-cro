@extends('layouts.app')

@section('title', 'Enjoy Safety México | Detección de Gases, Calibración ISO 17025 y Salud Visual')
@section('meta_description', 'Soluciones especializadas en seguridad industrial: detección de gases, renta de detectores conectados, laboratorio de calibración ISO/IEC 17025 y óptica móvil Enjoy Vision.')

@section('content')

<!-- ==========================================
     HERO SECTION (CRO: 3-Second Test & Dual CTA)
     ========================================== -->
<section class="relative bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white overflow-hidden py-16 lg:py-24 border-b border-slate-800">
    <!-- Subtle Background Glows -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Copy Column (CRO Persuasion) -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <!-- Trust Badge -->
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-slate-800/80 border border-slate-700 text-xs sm:text-sm font-semibold text-amber-400">
                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-ping"></span>
                    Especialistas en Seguridad Industrial & Salud Ocupacional en México
                </div>

                <!-- H1 Contundente -->
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight">
                    Detección de Gases, Calibración <span class="text-emerald-400 underline decoration-emerald-500/50">ISO 17025</span> y Salud Visual Industrial
                </h1>

                <!-- Subtítulo con propuesta de valor -->
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Protegemos a su personal y blindamos sus operaciones críticas con tecnología líder internacional, <strong>renta de detectores conectados</strong> con telemetría en tiempo real y servicio in-situ con <strong>Óptica Móvil</strong> en todo México.
                </p>

                <!-- Dual CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                    <a href="#cotizador-b2b" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-xl bg-amber-500 hover:bg-amber-600 text-slate-950 font-extrabold text-base shadow-xl shadow-amber-500/20 hover:shadow-amber-500/40 transition-all duration-200 transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Solicitar Cotización Inmediata
                    </a>
                    <a href="{{ route('catalog') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 border border-slate-600 text-slate-200 hover:text-white font-bold text-base transition-all duration-200">
                        <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        Explorar Catálogo y Marcas
                    </a>
                </div>

                <!-- 3 Quick Guarantees (Derisking) -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-6 border-t border-slate-800 text-xs sm:text-sm text-slate-400">
                    <div class="flex items-center justify-center lg:justify-start gap-2">
                        <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span>Respuesta técnica &lt; 2 hrs</span>
                    </div>
                    <div class="flex items-center justify-center lg:justify-start gap-2">
                        <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span>Validez STPS e ISO 17025</span>
                    </div>
                    <div class="flex items-center justify-center lg:justify-start gap-2">
                        <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span>Atención In-Situ en todo México</span>
                    </div>
                </div>
            </div>

            <!-- Right Hero Card / Visual Interactive Mockup -->
            <div class="lg:col-span-5">
                <div class="relative bg-slate-800/90 rounded-2xl p-6 border border-slate-700 shadow-2xl backdrop-blur-sm">
                    <!-- Card Header -->
                    <div class="flex items-center justify-between pb-4 border-b border-slate-700">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-300">Monitoreo y Calibración Activa</span>
                        </div>
                        <span class="px-2 py-0.5 rounded text-[11px] bg-emerald-500/20 text-emerald-400 font-bold border border-emerald-500/30">
                            ES Labs ISO 17025
                        </span>
                    </div>

                    <!-- Visual Imagery Display -->
                    <div class="py-4 space-y-4">
                        <div class="relative rounded-xl overflow-hidden bg-slate-900 border border-slate-700/60 aspect-video flex items-center justify-center p-4">
                            <img src="{{ asset('images/Equipos_Fijo.webp') }}" alt="Equipos de Detección de Gas y Calibración" class="max-h-full max-w-full object-contain filter drop-shadow-lg">
                            <div class="absolute bottom-2 left-2 bg-slate-950/80 backdrop-blur-md px-3 py-1 rounded text-xs text-slate-200 border border-slate-700">
                                Detección Conectada Blackline & Teledyne
                            </div>
                        </div>

                        <!-- 3 Real-time Status Badges -->
                        <div class="grid grid-cols-2 gap-3 text-xs">
                            <div class="bg-slate-900/90 p-3 rounded-lg border border-slate-700">
                                <div class="text-slate-400">Renta Conectada</div>
                                <div class="text-amber-400 font-bold text-sm mt-0.5">Paros de Planta 24/7</div>
                                <div class="text-[10px] text-slate-500 mt-0.5">Alertas SOS y Telemetría</div>
                            </div>
                            <div class="bg-slate-900/90 p-3 rounded-lg border border-slate-700">
                                <div class="text-slate-400">Unidad Enjoy Vision</div>
                                <div class="text-sky-400 font-bold text-sm mt-0.5">Óptica Móvil In-Situ</div>
                                <div class="text-[10px] text-slate-500 mt-0.5">Graduación en su empresa</div>
                            </div>
                        </div>

                        <!-- Fast Quote CTA Trigger -->
                        <a href="#cotizador-b2b" class="block text-center w-full py-2.5 rounded-lg bg-amber-500/20 hover:bg-amber-500 text-amber-300 hover:text-slate-950 border border-amber-500/40 font-bold text-xs transition duration-200">
                            Iniciar Cotización Técnica para su Planta →
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==========================================
     TRUST BAR: FABRICANTES LÍDERES & MARCAS
     ========================================== -->
<section class="bg-white dark:bg-slate-900 py-10 border-b border-slate-200 dark:border-slate-800 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6">
            <p class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-400">
                Tecnología de Fabricantes Reconocidos Internacionalmente
            </p>
        </div>
        
        <!-- Brand Logos Carousel / Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-6 items-center">
            @foreach($brands as $brand)
                <div class="flex items-center justify-center p-3 bg-slate-50 dark:bg-slate-800/80 hover:bg-white dark:hover:bg-slate-800 rounded-xl border border-slate-100 dark:border-slate-700/60 shadow-sm transition-all duration-200 group h-20">
                    <img src="{{ asset($brand->logo_path) }}" alt="{{ $brand->name }}" class="max-h-10 max-w-full object-contain filter grayscale group-hover:grayscale-0 dark:brightness-110 transition-all duration-300" title="{{ $brand->name }}">
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ==========================================
     4 CORE VALUE PILLARS (CRO: Confianza y Diferenciación)
     ========================================== -->
<section class="py-16 bg-slate-50 dark:bg-slate-950 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="text-amber-600 dark:text-amber-400 font-bold text-xs uppercase tracking-widest">¿Por qué Enjoy Safety Group?</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white mt-2">
                Más que equipos, ofrecemos soluciones especializadas de seguridad integral
            </h2>
            <p class="text-slate-600 dark:text-slate-400 mt-3 text-sm sm:text-base">
                Acompañamos a nuestros clientes desde la selección de equipos hasta su mantenimiento, calibración acreditada, renta y salud ocupacional.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Pillar 1 -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-amber-100 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white">Especialización Técnica</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400 mt-2 leading-relaxed">
                    Ingenieros capacitados por fabricantes directos para levantamientos en campo, especificación de sensores y proyectos clasificados.
                </p>
            </div>

            <!-- Pillar 2 -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-emerald-200 dark:border-emerald-900/60 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-emerald-100 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white">Calibración ISO 17025</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400 mt-2 leading-relaxed">
                    Certificados oficiales con trazabilidad metrológica para aprobar sin contratiempos auditorías de la STPS y Protección Civil.
                </p>
            </div>

            <!-- Pillar 3 -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-sky-100 dark:bg-sky-950/60 text-sky-600 dark:text-sky-400 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white">Renta Conectada 24/7</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400 mt-2 leading-relaxed">
                    Flota de detectores con telemetría celular listos para entrega inmediata en paros de planta y proyectos de contratistas.
                </p>
            </div>

            <!-- Pillar 4 -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-purple-100 dark:bg-purple-950/60 text-purple-600 dark:text-purple-400 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white">Óptica Móvil In-Situ</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400 mt-2 leading-relaxed">
                    Llevamos consultorio oftalmológico automatizado hasta las puertas de su empresa, eliminando ausentismos y traslados.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     CORE SOLUTIONS & SERVICES WITH PROGRESSIVE DISCLOSURE
     ========================================== -->
<section class="py-20 bg-white dark:bg-slate-900 transition-colors duration-200" id="soluciones"
         x-data="{
             expanded: false,
             visibleCount: 0,
             batchSize: 3,
             totalRemaining: {{ $remainingServices->count() }},
             isLoading: false,
             revealMore() {
                 if (!this.expanded) {
                     this.expanded = true;
                 }
                 if (this.visibleCount < this.totalRemaining) {
                     this.isLoading = true;
                     setTimeout(() => {
                         this.visibleCount = Math.min(this.visibleCount + this.batchSize, this.totalRemaining);
                         this.isLoading = false;
                     }, 200);
                 }
             },
             init() {
                 const observer = new IntersectionObserver((entries) => {
                     if (entries[0].isIntersecting && this.expanded && this.visibleCount < this.totalRemaining && !this.isLoading) {
                         this.revealMore();
                     }
                 }, { rootMargin: '150px' });
                 
                 this.$nextTick(() => {
                     if (this.$refs.infiniteSentinel) {
                         observer.observe(this.$refs.infiniteSentinel);
                     }
                 });
             }
         }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <span class="text-amber-600 dark:text-amber-400 font-bold text-xs uppercase tracking-widest">Portafolio Integral</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white mt-2">
                    Nuestras Soluciones y Servicios Especializados
                </h2>
                <p class="text-slate-600 dark:text-slate-400 mt-2 text-sm sm:text-base">
                    Tecnología, laboratorio de calibración y salud visual in-situ diseñados para proteger a su personal y blindar su operación.
                </p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="#cotizador-b2b" class="inline-flex items-center gap-1.5 text-sm font-bold text-amber-600 dark:text-amber-400 hover:text-amber-700 transition">
                    Cotizar paquete industrial integral →
                </a>
            </div>
        </div>

        <!-- 1. Featured Services Grid (Top 3 Priority) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredServices as $svc)
                <div class="bg-white dark:bg-slate-800/90 rounded-2xl border border-slate-200 dark:border-slate-700 overflow-hidden shadow-sm hover:shadow-xl hover:border-amber-400/50 dark:hover:border-amber-500/50 transition-all duration-300 flex flex-col group relative">
                    <!-- Image Header -->
                    <div class="h-48 bg-slate-100 dark:bg-slate-900/80 overflow-hidden relative flex items-center justify-center p-4">
                        <img src="{{ asset($svc->image_path) }}" alt="{{ $svc->name }}" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-3 left-3 flex items-center gap-2">
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold shadow-sm {{ $svc->division === 'ES Labs' ? 'bg-emerald-600 text-white' : ($svc->division === 'Enjoy Vision' ? 'bg-sky-600 text-white' : 'bg-slate-900 text-white') }}">
                                {{ $svc->division }}
                            </span>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500 text-slate-950 shadow-sm flex items-center gap-1">
                                ★ Destacado
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition">
                                {{ $svc->name }}
                            </h3>
                            <p class="text-xs font-semibold text-amber-600 dark:text-amber-400 mt-1">
                                {{ $svc->tagline }}
                            </p>
                            <p class="text-sm text-slate-600 dark:text-slate-300 mt-3 line-clamp-3 leading-relaxed">
                                {{ $svc->description }}
                            </p>

                            <!-- Features bullets -->
                            @if(!empty($svc->features))
                                <ul class="mt-4 space-y-1.5 text-xs text-slate-700 dark:text-slate-300 border-t border-slate-100 dark:border-slate-700 pt-3">
                                    @foreach(array_slice($svc->features, 0, 3) as $feat)
                                        <li class="flex items-start gap-1.5">
                                            <span class="text-emerald-500 font-bold mt-0.5">✓</span>
                                            <span>{{ $feat }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <!-- Card CTA -->
                        <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-700 flex items-center justify-between">
                            <a href="{{ route('service.show', $svc->slug) }}" class="text-xs font-bold text-slate-700 dark:text-slate-300 hover:text-amber-600 dark:hover:text-amber-400 transition">
                                Ver Detalles Técnicos
                            </a>
                            <a href="{{ route('contact') }}?servicio={{ $svc->slug }}" class="px-3.5 py-1.5 rounded-lg bg-amber-500 hover:bg-amber-600 text-slate-950 text-xs font-bold shadow-sm transition">
                                Cotizar Solución
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- 2. Action Button to Reveal the Rest -->
        <div class="mt-12 text-center" x-show="!expanded" x-transition>
            <button type="button"
                    @click="revealMore()"
                    class="inline-flex items-center gap-3 px-8 py-4 rounded-xl bg-slate-900 hover:bg-slate-800 dark:bg-amber-500 dark:hover:bg-amber-600 text-white dark:text-slate-950 font-bold text-sm sm:text-base shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200 group cursor-pointer">
                <span>Ver el resto de los servicios especializados ({{ $remainingServices->count() }} más)</span>
                <svg class="w-4 h-4 transform group-hover:translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-2">
                Descubre renta de equipos conectados, lentes de seguridad graduados y campañas visuales in-situ.
            </p>
        </div>

        <!-- 3. Progressive Infinite Scroll Section for Remaining Services -->
        <div x-show="expanded" x-cloak class="mt-14 pt-10 border-t border-slate-200 dark:border-slate-800" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
                <div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                        <span>Servicios Especializados y Terapias In-Situ</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-amber-100 dark:bg-amber-900/40 text-amber-800 dark:text-amber-300 font-semibold"
                              x-text="`Mostrando ${Math.min(visibleCount, totalRemaining)} de ${totalRemaining}`"></span>
                    </h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                        Cargando soluciones en bloques de 3 con desplazamiento continuo
                    </p>
                </div>
                <button type="button"
                        @click="expanded = false; visibleCount = 0"
                        class="text-xs font-semibold text-slate-600 hover:text-amber-600 dark:text-slate-400 dark:hover:text-amber-400 inline-flex items-center gap-1 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                    <span>Mostrar solo servicios destacados</span>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($remainingServices as $svc)
                    <div x-show="{{ $loop->index }} < visibleCount"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="bg-white dark:bg-slate-800/90 rounded-2xl border border-slate-200 dark:border-slate-700 overflow-hidden shadow-sm hover:shadow-xl hover:border-slate-300 dark:hover:border-slate-600 transition-all duration-300 flex flex-col group">
                        <!-- Image Header -->
                        <div class="h-48 bg-slate-100 dark:bg-slate-900/80 overflow-hidden relative flex items-center justify-center p-4">
                            <img src="{{ asset($svc->image_path) }}" alt="{{ $svc->name }}" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-3 left-3">
                                <span class="px-2.5 py-1 rounded-full text-xs font-bold shadow-sm {{ $svc->division === 'ES Labs' ? 'bg-emerald-600 text-white' : ($svc->division === 'Enjoy Vision' ? 'bg-sky-600 text-white' : 'bg-slate-900 text-white') }}">
                                    {{ $svc->division }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition">
                                    {{ $svc->name }}
                                </h3>
                                <p class="text-xs font-semibold text-amber-600 dark:text-amber-400 mt-1">
                                    {{ $svc->tagline }}
                                </p>
                                <p class="text-sm text-slate-600 dark:text-slate-300 mt-3 line-clamp-3 leading-relaxed">
                                    {{ $svc->description }}
                                </p>

                                <!-- Features bullets -->
                                @if(!empty($svc->features))
                                    <ul class="mt-4 space-y-1.5 text-xs text-slate-700 dark:text-slate-300 border-t border-slate-100 dark:border-slate-700 pt-3">
                                        @foreach(array_slice($svc->features, 0, 3) as $feat)
                                            <li class="flex items-start gap-1.5">
                                                <span class="text-emerald-500 font-bold mt-0.5">✓</span>
                                                <span>{{ $feat }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            <!-- Card CTA -->
                            <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-700 flex items-center justify-between">
                                <a href="{{ route('service.show', $svc->slug) }}" class="text-xs font-bold text-slate-700 dark:text-slate-300 hover:text-amber-600 dark:hover:text-amber-400 transition">
                                    Ver Detalles Técnicos
                                </a>
                                <a href="{{ route('contact') }}?servicio={{ $svc->slug }}" class="px-3.5 py-1.5 rounded-lg bg-amber-500 hover:bg-amber-600 text-slate-950 text-xs font-bold shadow-sm transition">
                                    Cotizar Solución
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Infinite Scroll Sentinel & Loading Indicator -->
            <div x-ref="infiniteSentinel" class="py-8 flex flex-col justify-center items-center">
                <div x-show="isLoading" class="flex items-center gap-2 text-xs font-semibold text-amber-600 dark:text-amber-400">
                    <svg class="animate-spin h-5 w-5 text-amber-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Cargando servicios adicionales...</span>
                </div>
                <div x-show="visibleCount >= totalRemaining && totalRemaining > 0" class="text-xs font-medium text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800/80 px-4 py-2 rounded-full border border-slate-200 dark:border-slate-700">
                    ✓ Has visualizado la totalidad del catálogo de soluciones y servicios ({{ $featuredServices->count() + $remainingServices->count() }} soluciones)
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     DEEP DIVE: ES LABS CALIBRACIÓN ISO/IEC 17025
     ========================================== -->
<section class="py-20 bg-slate-900 text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 text-xs font-bold">
                    Laboratorio Acreditado ES Labs
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight">
                    Calibración de Detectores con Validez para Auditorías STPS e ISO
                </h2>
                <p class="text-slate-300 text-base leading-relaxed">
                    A través de <strong>ES Labs</strong>, ofrecemos servicios especializados de calibración para detectores de gas fijos y portátiles conforme a la norma internacional <strong>ISO/IEC 17025</strong>. Proporcionamos certeza metrológica y trazabilidad hacia patrones del CENAM y NIST.
                </p>
                <div class="space-y-3 text-sm text-slate-300">
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0 mt-0.5 font-bold">✓</div>
                        <div><strong>Multimarca:</strong> Calibramos Blackline, Teledyne, MSA, Honeywell, RAE Systems e Industrial Scientific.</div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0 mt-0.5 font-bold">✓</div>
                        <div><strong>Tiempos Ágiles:</strong> Servicio estándar de 3 a 5 días y servicio exprés de 24-48 hrs para paros de planta.</div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0 mt-0.5 font-bold">✓</div>
                        <div><strong>Documentación Completa:</strong> Certificados con cálculo de incertidumbre y etiqueta de calibración inviolable.</div>
                    </div>
                </div>
                <div class="pt-2">
                    <a href="#cotizador-b2b" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-slate-950 font-bold text-sm shadow-lg shadow-emerald-500/20 transition">
                        Solicitar Calibración Acreditada para su Lote de Detectores
                    </a>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="relative bg-slate-800 rounded-2xl p-6 border border-slate-700 shadow-2xl">
                    <img src="{{ asset('images/Laboratorio_de_Calibracion.webp') }}" alt="Laboratorio de Calibración Acreditado ISO 17025" class="rounded-xl w-full object-cover shadow-md">
                    <div class="mt-4 p-4 rounded-xl bg-slate-900/90 border border-slate-700 flex items-center justify-between">
                        <div>
                            <div class="text-xs text-slate-400 uppercase font-semibold">Acreditación Oficial</div>
                            <div class="text-emerald-400 font-bold text-sm">Norma Internacional ISO/IEC 17025</div>
                        </div>
                        <span class="px-3 py-1 bg-emerald-500/20 text-emerald-300 rounded-full text-xs font-bold border border-emerald-500/30">
                            Acreditado
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     DEEP DIVE: ENJOY VISION & ÓPTICA MÓVIL
     ========================================== -->
<section class="py-20 bg-slate-50 dark:bg-slate-950 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6 order-2 lg:order-1">
                <div class="grid grid-cols-2 gap-4">
                    <div class="rounded-2xl overflow-hidden shadow-md bg-white dark:bg-slate-900 p-2 border border-slate-200 dark:border-slate-800">
                        <img src="{{ asset('images/Camion_Enjoy.webp') }}" alt="Camión Óptica Móvil Enjoy Vision" class="rounded-xl w-full h-48 object-cover">
                        <div class="p-2 text-center text-xs font-bold text-slate-800 dark:text-slate-200">Unidad Móvil Enjoy Vision</div>
                    </div>
                    <div class="rounded-2xl overflow-hidden shadow-md bg-white dark:bg-slate-900 p-2 border border-slate-200 dark:border-slate-800">
                        <img src="{{ asset('images/Vision-S-700-Visual-10-1-e1668681571435.webp') }}" alt="Equipo Oftalmológico Vision-S 700" class="rounded-xl w-full h-48 object-cover">
                        <div class="p-2 text-center text-xs font-bold text-slate-800 dark:text-slate-200">Tecnología Vision-S 700</div>
                    </div>
                </div>
                <div class="mt-4 bg-sky-50 dark:bg-sky-950/50 border border-sky-200 dark:border-sky-800 rounded-xl p-4 text-xs text-sky-900 dark:text-sky-300 leading-relaxed">
                    💡 <strong>Cero ausentismo laboral:</strong> Al evaluar a su personal directamente en planta durante sus turnos, se ahorran hasta 4 horas por empleado en traslados y citas externas.
                </div>
            </div>

            <div class="lg:col-span-6 order-1 lg:order-2 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-100 dark:bg-sky-950 text-sky-700 dark:text-sky-300 border border-sky-200 dark:border-sky-800 text-xs font-bold">
                    División Enjoy Vision
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white leading-tight">
                    Óptica Móvil y Lentes de Seguridad Graduados In-Situ
                </h2>
                <p class="text-slate-600 dark:text-slate-300 text-base leading-relaxed">
                    Con la <strong>Óptica Móvil Enjoy Vision</strong> llevamos un consultorio oftalmológico climatizado de última generación hasta su parque industrial o planta de manufactura. Realizamos exámenes visuales computarizados y suministramos armazones de seguridad certificados <strong>Armourx (ANSI Z87.1 / NOM-017-STPS)</strong>.
                </p>
                <div class="space-y-3 text-sm text-slate-700 dark:text-slate-300">
                    <div class="flex items-center gap-2">
                        <span class="text-sky-500 font-bold">✓</span>
                        <span>Evaluaciones de alta precisión en solo 10-12 minutos por colaborador.</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-sky-500 font-bold">✓</span>
                        <span>Micas de policarbonato industrial antirrayaduras y antirreflejante.</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-sky-500 font-bold">✓</span>
                        <span>Facilidades de deducción vía nómina o prestación empresarial.</span>
                    </div>
                </div>
                <div class="pt-2">
                    <a href="#cotizador-b2b" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-sky-600 hover:bg-sky-700 text-white font-bold text-sm shadow-md transition">
                        Agendar Visita de la Óptica Móvil en su Planta
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     MERCADOS INDUSTRIALES
     ========================================== -->
<section class="py-16 bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-amber-600 dark:text-amber-400 font-bold text-xs uppercase tracking-widest">Sectores Atendidos</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white mt-2">
                Experiencia en las Industrias más Exigentes
            </h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <div class="p-4 bg-slate-50 dark:bg-slate-800/80 rounded-xl border border-slate-200 dark:border-slate-700 text-center hover:border-amber-400 transition">
                <img src="{{ asset('images/markets-oil-and-gas.webp') }}" alt="Petróleo y Gas" class="h-20 w-full object-cover rounded-lg mb-2">
                <div class="font-bold text-xs text-slate-800 dark:text-slate-200">Petróleo y Gas</div>
            </div>
            <div class="p-4 bg-slate-50 dark:bg-slate-800/80 rounded-xl border border-slate-200 dark:border-slate-700 text-center hover:border-amber-400 transition">
                <img src="{{ asset('images/markets-confined-space.webp') }}" alt="Espacios Confinados" class="h-20 w-full object-cover rounded-lg mb-2">
                <div class="font-bold text-xs text-slate-800 dark:text-slate-200">Espacios Confinados</div>
            </div>
            <div class="p-4 bg-slate-50 dark:bg-slate-800/80 rounded-xl border border-slate-200 dark:border-slate-700 text-center hover:border-amber-400 transition">
                <img src="{{ asset('images/_Methane_Emissions.webp') }}" alt="Reducción de Metano" class="h-20 w-full object-cover rounded-lg mb-2">
                <div class="font-bold text-xs text-slate-800 dark:text-slate-200">Emisiones de Metano</div>
            </div>
            <div class="p-4 bg-slate-50 dark:bg-slate-800/80 rounded-xl border border-slate-200 dark:border-slate-700 text-center hover:border-amber-400 transition">
                <img src="{{ asset('images/markets-hydrogen-storage.jpeg') }}" alt="Hidrógeno" class="h-20 w-full object-cover rounded-lg mb-2">
                <div class="font-bold text-xs text-slate-800 dark:text-slate-200">Transición a Hidrógeno</div>
            </div>
            <div class="p-4 bg-slate-50 dark:bg-slate-800/80 rounded-xl border border-slate-200 dark:border-slate-700 text-center hover:border-amber-400 transition">
                <img src="{{ asset('images/markets-energy.webp') }}" alt="Energía" class="h-20 w-full object-cover rounded-lg mb-2">
                <div class="font-bold text-xs text-slate-800 dark:text-slate-200">Generación de Energía</div>
            </div>
            <div class="p-4 bg-slate-50 dark:bg-slate-800/80 rounded-xl border border-slate-200 dark:border-slate-700 text-center hover:border-amber-400 transition">
                <img src="{{ asset('images/markets-data-management.webp') }}" alt="Seguridad Conectada" class="h-20 w-full object-cover rounded-lg mb-2">
                <div class="font-bold text-xs text-slate-800 dark:text-slate-200">Seguridad Conectada</div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     CATÁLOGO DESTACADO DE EQUIPOS
     ========================================== -->
<section class="py-20 bg-slate-50 dark:bg-slate-950 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <span class="text-amber-600 dark:text-amber-400 font-bold text-xs uppercase tracking-widest">Equipamiento Industrial</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white mt-2">
                    Catálogo de Detectores, Tubos y Protección Visual
                </h2>
                <p class="text-slate-600 dark:text-slate-400 mt-2 text-sm">
                    Equipos de entrega inmediata con calibración certificada y soporte técnico directo.
                </p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('catalog') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-amber-600 dark:text-amber-400 hover:text-amber-700 transition">
                    Ver todos los equipos y tubos colorimétricos →
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredProducts as $prod)
                <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm hover:shadow-lg transition flex flex-col justify-between">
                    <div class="p-6">
                        <div class="h-44 bg-slate-50 dark:bg-slate-800/60 rounded-xl overflow-hidden flex items-center justify-center p-3 mb-4">
                            <img src="{{ asset($prod->image_path) }}" alt="{{ $prod->name }}" class="max-h-full max-w-full object-contain">
                        </div>
                        <div class="flex items-center justify-between text-xs mb-2">
                            <span class="font-semibold text-slate-500 dark:text-slate-400 uppercase">{{ $prod->brand->name ?? 'Enjoy Safety' }}</span>
                            <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-[11px] font-medium">{{ $prod->category->name ?? 'Equipo' }}</span>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white line-clamp-2">
                            {{ $prod->name }}
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-2">
                            {{ $prod->short_description }}
                        </p>

                        @if(!empty($prod->technical_specs))
                            <div class="mt-4 bg-slate-50 dark:bg-slate-800/80 rounded-lg p-2.5 space-y-1 text-[11px] text-slate-600 dark:text-slate-300">
                                @foreach(array_slice($prod->technical_specs, 0, 2) as $k => $v)
                                    <div><strong class="text-slate-800 dark:text-white">{{ $k }}:</strong> {{ $v }}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="p-6 pt-0 border-t border-slate-100 dark:border-slate-800 mt-2 flex items-center justify-between">
                        <div>
                            @if($prod->price)
                                <div class="text-[10px] text-slate-400 uppercase font-semibold">Precio Referencial</div>
                                <div class="text-base font-extrabold text-slate-900 dark:text-white">MXN$ {{ number_format($prod->price, 2) }}</div>
                            @else
                                <span class="inline-flex items-center text-xs font-semibold text-amber-700 dark:text-amber-400 bg-amber-50 dark:bg-amber-950/60 px-2 py-0.5 rounded">
                                    Cotización por Lote B2B
                                </span>
                            @endif
                        </div>
                        <a href="{{ route('contact') }}?servicio=equipos_fijos_portatiles&equipo={{ urlencode($prod->name) }}" class="px-3.5 py-1.5 rounded-lg bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold text-xs shadow-sm transition">
                            Cotizar
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ==========================================
     SMART B2B QUOTE GENERATOR / RFQ FORM (CRO KEYSTONE)
     ========================================== -->
<section class="py-20 bg-slate-900 text-white relative overflow-hidden" id="cotizador-b2b">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-500/20 text-amber-400 text-xs font-bold border border-amber-500/30">
                Atención B2B Prioritaria
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-3">
                Solicite su Cotización Técnica Inmediata
            </h2>
            <p class="text-slate-400 text-sm mt-2">
                Complete el formulario para recibir una propuesta formal con especificaciones técnicas, disponibilidad y precios por lote en menos de <strong>2 horas hábiles</strong>.
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-slate-800/90 rounded-2xl border border-slate-700 p-6 sm:p-10 shadow-2xl backdrop-blur-md">
            <form action="{{ route('quote.submit') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Contact & Company Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="full_name" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                            Nombre Completo *
                        </label>
                        <input type="text" name="full_name" id="full_name" required placeholder="Ej. Ing. Juan Pérez" value="{{ old('full_name') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
                    </div>

                    <div>
                        <label for="company" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                            Empresa o Razón Social *
                        </label>
                        <input type="text" name="company" id="company" required placeholder="Ej. Petroquímica del Norte S.A." value="{{ old('company') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                            Correo Corporativo *
                        </label>
                        <input type="email" name="email" id="email" required placeholder="juan.perez@empresa.com" value="{{ old('email') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
                    </div>

                    <div>
                        <label for="phone" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                            Teléfono Directo / WhatsApp *
                        </label>
                        <input type="tel" name="phone" id="phone" required placeholder="Ej. 55 1234 5678" value="{{ old('phone') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
                    </div>
                </div>

                <!-- Requirement Selection -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="service_type" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                            Tipo de Solución Requerida *
                        </label>
                        <select name="service_type" id="service_type" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
                            <option value="">Seleccione una opción...</option>
                            <option value="calibracion_iso17025">Calibración Acreditada ISO/IEC 17025 (ES Labs)</option>
                            <option value="renta_detectores">Renta de Detectores de Gas Conectados</option>
                            <option value="equipos_fijos_portatiles">Venta de Equipos y Detectores Nuevos</option>
                            <option value="optica_movil">Óptica Móvil Enjoy Vision en Planta</option>
                            <option value="lentes_prescripcion">Lentes de Seguridad Graduados (Armourx)</option>
                            <option value="campana_salud_visual">Campaña de Salud Visual para Empresas</option>
                        </select>
                    </div>

                    <div>
                        <label for="equipment_interest" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                            Gases a Medir / N° de Equipos o Personas
                        </label>
                        <input type="text" name="equipment_interest" id="equipment_interest" placeholder="Ej. 10 detectores H2S / LEL o 150 empleados" value="{{ old('equipment_interest') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
                    </div>
                </div>

                <!-- Message Details -->
                <div>
                    <label for="details" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                        Detalles Adicionales del Proyecto o Paro de Planta
                    </label>
                    <textarea name="details" id="details" rows="3" placeholder="Indique lugar de entrega, fechas estimadas o especificaciones técnicas relevantes..." class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">{{ old('details') }}</textarea>
                </div>

                <!-- Privacy Checkbox (LFPDPPP) -->
                <div class="flex items-start gap-3 pt-2">
                    <input type="checkbox" id="privacy_agree" required class="mt-1 w-4 h-4 rounded text-amber-500 bg-slate-900 border-slate-700 focus:ring-amber-500">
                    <label for="privacy_agree" class="text-xs text-slate-400">
                        Acepto el <a href="{{ route('privacy') }}" target="_blank" class="text-amber-400 underline hover:text-amber-300">Aviso de Privacidad</a> de Enjoy Safety Group para el tratamiento seguro y confidencial de los datos de mi empresa conforme a la LFPDPPP.
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-4 rounded-xl bg-amber-500 hover:bg-amber-600 text-slate-950 font-extrabold text-base shadow-xl hover:shadow-amber-500/30 transition-all duration-200 transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    Enviar Solicitud de Cotización B2B
                </button>
            </form>
        </div>
    </div>
</section>

<!-- ==========================================
     SOCIAL PROOF & TESTIMONIALS (CRO TRUST)
     ========================================== -->
<section class="py-20 bg-white dark:bg-slate-900 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="text-amber-600 dark:text-amber-400 font-bold text-xs uppercase tracking-widest">Testimonios Verificados</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white mt-2">
                Lo que Dicen Líderes de Seguridad e Higiene Industrial
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $test)
                <div class="bg-slate-50 dark:bg-slate-800/80 p-8 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm flex flex-col justify-between">
                    <div>
                        <!-- 5 Star Rating -->
                        <div class="flex items-center gap-1 text-amber-400 mb-4">
                            @for($i = 0; $i < $test->rating; $i++)
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <p class="text-sm text-slate-700 dark:text-slate-300 italic leading-relaxed">
                            "{{ $test->content }}"
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-200 dark:border-slate-700">
                        <div class="font-bold text-slate-900 dark:text-white text-sm">{{ $test->author_name }}</div>
                        <div class="text-xs text-slate-500 dark:text-slate-400">{{ $test->author_title }}</div>
                        <div class="text-xs font-semibold text-amber-600 dark:text-amber-400 mt-0.5">{{ $test->company }} · {{ $test->industry }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ==========================================
     FAQ SECTION (CRO: Overcoming Objections)
     ========================================== -->
<section class="py-20 bg-slate-50 dark:bg-slate-950 border-t border-slate-200 dark:border-slate-800 transition-colors duration-200" id="faqs">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-amber-600 dark:text-amber-400 font-bold text-xs uppercase tracking-widest">Preguntas Frecuentes</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white mt-2">
                Resolvemos sus Dudas Técnicas y Operativas
            </h2>
        </div>

        <div class="space-y-4" x-data="{ active: null }">
            @foreach($faqs as $index => $faq)
                <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm transition">
                    <button type="button" class="w-full px-6 py-4 text-left font-bold text-sm sm:text-base text-slate-900 dark:text-white hover:text-amber-600 dark:hover:text-amber-400 flex items-center justify-between transition" @click="active = (active === {{ $index }} ? null : {{ $index }})">
                        <span>{{ $faq->question }}</span>
                        <svg class="w-5 h-5 text-slate-400 transition-transform duration-200" :class="{ 'rotate-180': active === {{ $index }} }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="active === {{ $index }}" x-transition class="px-6 pb-5 text-sm text-slate-600 dark:text-slate-300 leading-relaxed border-t border-slate-100 dark:border-slate-800 pt-3">
                        {{ $faq->answer }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
