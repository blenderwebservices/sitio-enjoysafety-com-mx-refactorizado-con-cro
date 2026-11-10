<!DOCTYPE html>
<html lang="es-MX" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Enjoy Safety Group - Soluciones industriales en detección de gases, calibración acreditada ISO/IEC 17025 con ES Labs y salud visual ocupacional con Enjoy Vision en todo México.')">
    <title>@yield('title', 'Enjoy Safety México | Detección de Gases, Calibración ISO 17025 y Salud Visual')</title>

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    
    <!-- OpenGraph / Social -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Enjoy Safety México | Detección de Gases y Salud Visual')">
    <meta property="og:description" content="Especialistas en detección de gas, renta de detectores conectados, calibración ISO 17025 y óptica móvil en México.">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Script de Inicialización de Tema FOUC Prevention (Claro por default, Oscuro, Sistema) -->
    <script>
        (function () {
            const savedTheme = localStorage.getItem('theme') || 'light';
            const isDark = savedTheme === 'dark' || (savedTheme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);
            if (isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 font-sans antialiased flex flex-col min-h-screen transition-colors duration-200" x-data="{ mobileMenuOpen: false }">

    <!-- Top Announcement Bar (CRO: Urgencia, Confianza y Contacto Directo) -->
    <div class="bg-slate-900 text-slate-300 text-xs sm:text-sm py-2 px-4 border-b border-slate-800">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-400 font-medium">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    Laboratorio Acreditado ISO/IEC 17025
                </span>
                <span class="hidden md:inline text-slate-400">|</span>
                <span class="hidden md:inline">{{ $siteSettings->topbar_announcement ?? 'Tiempos de entrega estándar y servicio exprés 24-48 hrs' }}</span>
            </div>
            <div class="flex items-center gap-4 text-xs">
                <a href="tel:{{ $siteSettings->phone1_clean ?? '+525541697780' }}" class="hover:text-amber-400 transition flex items-center gap-1 font-semibold text-slate-200">
                    <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 4V3z"/></svg>
                    {{ $siteSettings->phone_1 ?? '+52 55 4169 7780' }}
                </a>
                <span class="text-slate-600">|</span>
                <a href="mailto:{{ $siteSettings->contact_email ?? 'contacto@enjoysafety.com.mx' }}" class="hover:text-amber-400 transition hidden sm:inline">
                    {{ $siteSettings->contact_email ?? 'contacto@enjoysafety.com.mx' }}
                </a>
                <span class="text-slate-600 hidden sm:inline">|</span>
                <a href="/admin" class="hover:text-white transition flex items-center gap-1 text-slate-400 hover:text-slate-200">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Portal Admin
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <header class="sticky top-0 z-50 bg-white/95 dark:bg-slate-900/95 backdrop-blur-md shadow-sm border-b border-slate-200 dark:border-slate-800 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Brand Logo -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                        <img src="{{ $siteSettings->logo_url ?? asset('images/logo.png') }}"
                             alt="{{ $siteSettings->site_name ?? 'Enjoy Safety México' }}"
                             class="w-auto object-contain dark:brightness-110"
                             style="height: {{ $siteSettings->logo_height ?? 48 }}px;">
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center gap-7 text-sm font-medium text-slate-700 dark:text-slate-300">
                    <a href="{{ route('home') }}" class="hover:text-amber-600 dark:hover:text-amber-400 transition {{ request()->routeIs('home') ? 'text-amber-600 dark:text-amber-400 font-semibold' : '' }}">
                        Inicio
                    </a>

                    <!-- Solutions Dropdown -->
                    <div class="relative" x-data="{ open: false }" @click.outside="open = false" @mouseenter="open = true" @mouseleave="open = false">
                        <button type="button" class="flex items-center gap-1 hover:text-amber-600 dark:hover:text-amber-400 transition py-2" @click="open = !open">
                            <span>Soluciones</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition.opacity.duration.200ms class="absolute left-0 mt-1 w-80 bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-slate-200 dark:border-slate-700 py-3 z-50">
                            <div class="px-4 py-1.5 text-xs font-semibold text-slate-400 dark:text-slate-400 uppercase tracking-wider">Enjoy Safety</div>
                            <a href="{{ route('service.show', 'equipos-deteccion-gases') }}" class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/60 text-slate-800 dark:text-slate-200 hover:text-amber-600 dark:hover:text-amber-400 transition text-sm">
                                <div class="font-semibold">Equipos de Detección de Gases</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">Portátiles, fijos y detección de flama</div>
                            </a>
                            <a href="{{ route('service.show', 'renta-detectores-conectados') }}" class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/60 text-slate-800 dark:text-slate-200 hover:text-amber-600 dark:hover:text-amber-400 transition text-sm">
                                <div class="font-semibold">Renta de Detectores Conectados</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">Paros de planta y telemetría en vivo</div>
                            </a>
                            <div class="border-t border-slate-100 dark:border-slate-700 my-1"></div>
                            <div class="px-4 py-1.5 text-xs font-semibold text-emerald-600 dark:text-emerald-400 uppercase tracking-wider">ES Labs Acreditado</div>
                            <a href="{{ route('service.show', 'laboratorio-calibracion-iso17025') }}" class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/60 text-slate-800 dark:text-slate-200 hover:text-emerald-700 dark:hover:text-emerald-400 transition text-sm">
                                <div class="font-semibold flex items-center gap-1.5">
                                    Calibración ISO/IEC 17025
                                    <span class="px-1.5 py-0.5 rounded text-[10px] bg-emerald-100 dark:bg-emerald-950 text-emerald-800 dark:text-emerald-300 font-bold">Oficial</span>
                                </div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">Validez ante STPS y Protección Civil</div>
                            </a>
                            <div class="border-t border-slate-100 dark:border-slate-700 my-1"></div>
                            <div class="px-4 py-1.5 text-xs font-semibold text-sky-600 dark:text-sky-400 uppercase tracking-wider">Enjoy Vision</div>
                            <a href="{{ route('service.show', 'optica-movil-in-situ') }}" class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/60 text-slate-800 dark:text-slate-200 hover:text-sky-600 dark:hover:text-sky-400 transition text-sm">
                                <div class="font-semibold">Óptica Móvil In-Situ</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">Camión clínico de alta tecnología en su empresa</div>
                            </a>
                            <a href="{{ route('service.show', 'lentes-seguridad-prescripcion') }}" class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/60 text-slate-800 dark:text-slate-200 hover:text-sky-600 dark:hover:text-sky-400 transition text-sm">
                                <div class="font-semibold">Lentes de Seguridad con Prescripción</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">Armazones certificados Armourx (ANSI Z87.1)</div>
                            </a>
                            <a href="{{ route('service.show', 'campanas-salud-visual-empresas') }}" class="block px-4 py-2 hover:bg-slate-50 dark:hover:bg-slate-700/60 text-slate-800 dark:text-slate-200 hover:text-sky-600 dark:hover:text-sky-400 transition text-sm">
                                <div class="font-semibold">Campañas de Salud Visual</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">Evaluaciones periódicas para colaboradores</div>
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('service.show', 'laboratorio-calibracion-iso17025') }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition flex items-center gap-1 text-slate-700 dark:text-slate-300">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        Laboratorio ISO 17025
                    </a>

                    <a href="{{ route('service.show', 'optica-movil-in-situ') }}" class="hover:text-sky-600 dark:hover:text-sky-400 transition">
                        Óptica Móvil
                    </a>

                    <a href="{{ route('catalog') }}" class="hover:text-amber-600 dark:hover:text-amber-400 transition {{ request()->routeIs('catalog') ? 'text-amber-600 dark:text-amber-400 font-semibold' : '' }}">
                        Catálogo de Equipos
                    </a>

                    <a href="{{ route('contact') }}" class="hover:text-amber-600 dark:hover:text-amber-400 transition {{ request()->routeIs('contact') ? 'text-amber-600 dark:text-amber-400 font-semibold' : '' }}">
                        Contacto
                    </a>
                </nav>

                <!-- Desktop Actions: Theme Selector + Primary CTA Button -->
                <div class="hidden lg:flex items-center gap-3">
                    
                    <!-- THEME SELECTOR DROPDOWN (Claro default, Oscuro, Sistema) -->
                    <div class="relative" x-data="{ themeOpen: false }">
                        <button type="button" @click="themeOpen = !themeOpen" @click.outside="themeOpen = false" class="p-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:text-amber-500 dark:hover:text-amber-400 focus:outline-none transition-all flex items-center gap-1.5 text-xs font-semibold" title="Seleccionar tema (Claro, Oscuro, Sistema)">
                            <!-- Dynamic Icon based on current selection -->
                            <span class="w-4 h-4 flex items-center justify-center">
                                <template x-if="$store.theme && $store.theme.current === 'light'">
                                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                </template>
                                <template x-if="$store.theme && $store.theme.current === 'dark'">
                                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                                </template>
                                <template x-if="$store.theme && $store.theme.current === 'system'">
                                    <svg class="w-4 h-4 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </template>
                            </span>
                            <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>

                        <!-- Theme Dropdown Menu -->
                        <div x-show="themeOpen" x-transition.opacity.duration.150ms class="absolute right-0 mt-2 w-40 rounded-xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-xl py-1.5 z-50 text-xs font-medium">
                            <button type="button" @click="$store.theme.setTheme('light'); themeOpen = false" class="w-full px-3 py-2 flex items-center justify-between text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700/60 transition" :class="{ 'font-bold text-amber-600 dark:text-amber-400 bg-amber-50 dark:bg-slate-700/80': $store.theme && $store.theme.current === 'light' }">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                    Claro <span class="text-[10px] text-slate-400">(Default)</span>
                                </span>
                                <span x-show="$store.theme && $store.theme.current === 'light'" class="text-amber-500 font-bold">✓</span>
                            </button>
                            <button type="button" @click="$store.theme.setTheme('dark'); themeOpen = false" class="w-full px-3 py-2 flex items-center justify-between text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700/60 transition" :class="{ 'font-bold text-amber-600 dark:text-amber-400 bg-amber-50 dark:bg-slate-700/80': $store.theme && $store.theme.current === 'dark' }">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                                    Oscuro
                                </span>
                                <span x-show="$store.theme && $store.theme.current === 'dark'" class="text-amber-400 font-bold">✓</span>
                            </button>
                            <button type="button" @click="$store.theme.setTheme('system'); themeOpen = false" class="w-full px-3 py-2 flex items-center justify-between text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700/60 transition" :class="{ 'font-bold text-sky-600 dark:text-sky-400 bg-sky-50 dark:bg-slate-700/80': $store.theme && $store.theme.current === 'system' }">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    Sistema
                                </span>
                                <span x-show="$store.theme && $store.theme.current === 'system'" class="text-sky-500 font-bold">✓</span>
                            </button>
                        </div>
                    </div>

                    <!-- Primary High Contrast Button -->
                    <a href="#cotizador-b2b" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold text-sm shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        Solicitar Cotización B2B
                    </a>
                </div>

                <!-- Mobile Header Right Actions -->
                <div class="lg:hidden flex items-center gap-2">
                    <!-- Quick Mobile Theme Switcher -->
                    <button type="button" @click="$store.theme.setTheme($store.theme.current === 'light' ? 'dark' : ($store.theme.current === 'dark' ? 'system' : 'light'))" class="p-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200" title="Alternar tema">
                        <template x-if="$store.theme && $store.theme.current === 'light'">
                            <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </template>
                        <template x-if="$store.theme && $store.theme.current === 'dark'">
                            <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                        </template>
                        <template x-if="$store.theme && $store.theme.current === 'system'">
                            <svg class="w-4 h-4 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </template>
                    </button>

                    <a href="#cotizador-b2b" class="px-3 py-1.5 rounded-lg bg-amber-500 text-slate-950 text-xs font-bold shadow-sm">
                        Cotizar
                    </a>
                    <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-md text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-800 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu panel -->
        <div x-show="mobileMenuOpen" x-transition class="lg:hidden bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 px-4 pt-2 pb-6 space-y-3">
            
            <!-- Mobile Theme Switcher Bar -->
            <div class="p-2.5 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-between text-xs font-semibold">
                <span class="text-slate-500 dark:text-slate-400">Tema Visual:</span>
                <div class="flex items-center gap-1">
                    <button type="button" @click="$store.theme.setTheme('light')" class="px-2.5 py-1 rounded-lg transition" :class="$store.theme && $store.theme.current === 'light' ? 'bg-white dark:bg-slate-700 text-amber-600 dark:text-amber-400 shadow-sm font-bold' : 'text-slate-600 dark:text-slate-400'">
                        ☀️ Claro
                    </button>
                    <button type="button" @click="$store.theme.setTheme('dark')" class="px-2.5 py-1 rounded-lg transition" :class="$store.theme && $store.theme.current === 'dark' ? 'bg-white dark:bg-slate-700 text-amber-400 shadow-sm font-bold' : 'text-slate-600 dark:text-slate-400'">
                        🌙 Oscuro
                    </button>
                    <button type="button" @click="$store.theme.setTheme('system')" class="px-2.5 py-1 rounded-lg transition" :class="$store.theme && $store.theme.current === 'system' ? 'bg-white dark:bg-slate-700 text-sky-400 shadow-sm font-bold' : 'text-slate-600 dark:text-slate-400'">
                        💻 Sistema
                    </button>
                </div>
            </div>

            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-800 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-800">Inicio</a>
            <div class="px-3 py-1 text-xs font-bold text-slate-400 uppercase">Soluciones Industriales</div>
            <a href="{{ route('service.show', 'equipos-deteccion-gases') }}" class="block px-3 py-1.5 text-sm text-slate-700 dark:text-slate-300 hover:text-amber-600">Equipos de Detección</a>
            <a href="{{ route('service.show', 'renta-detectores-conectados') }}" class="block px-3 py-1.5 text-sm text-slate-700 dark:text-slate-300 hover:text-amber-600">Renta de Detectores Conectados</a>
            <a href="{{ route('service.show', 'laboratorio-calibracion-iso17025') }}" class="block px-3 py-1.5 text-sm text-emerald-700 dark:text-emerald-400 font-semibold">Laboratorio ISO/IEC 17025 (ES Labs)</a>
            <a href="{{ route('service.show', 'optica-movil-in-situ') }}" class="block px-3 py-1.5 text-sm text-sky-700 dark:text-sky-400 font-semibold">Óptica Móvil Enjoy Vision</a>
            <a href="{{ route('service.show', 'lentes-seguridad-prescripcion') }}" class="block px-3 py-1.5 text-sm text-slate-700 dark:text-slate-300 hover:text-sky-600">Lentes de Seguridad Graduados</a>
            <a href="{{ route('service.show', 'campanas-salud-visual-empresas') }}" class="block px-3 py-1.5 text-sm text-slate-700 dark:text-slate-300 hover:text-sky-600">Campañas de Salud Visual</a>
            <div class="border-t border-slate-100 dark:border-slate-800 pt-2"></div>
            <a href="{{ route('catalog') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-800 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-800">Catálogo de Equipos</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-800 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-800">Contacto Corporativo</a>
            <a href="/admin" class="block px-3 py-2 rounded-md text-base font-medium text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800">Portal Administrativo</a>
            <a href="#cotizador-b2b" @click="mobileMenuOpen = false" class="block text-center w-full px-4 py-2.5 rounded-lg bg-amber-500 text-slate-950 font-bold text-sm">
                Solicitar Cotización Inmediata
            </a>
        </div>
    </header>

    <!-- Success Toast Notice -->
    @if(session('success'))
        <div class="bg-emerald-600 text-white px-4 py-3 shadow-md border-b border-emerald-700 sticky top-20 z-40" x-data="{ show: true }" x-show="show">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 flex-shrink-0 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
                <button type="button" @click="show = false" class="text-emerald-100 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
    @endif

    <!-- Main Page Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Floating WhatsApp B2B Widget (CRO: 70%+ canal de urgencias en México) -->
    <a href="https://wa.me/{{ $siteSettings->whatsapp_clean_number ?? '525541697780' }}?text={{ urlencode($siteSettings->whatsapp_message ?? 'Hola Enjoy Safety, deseo cotizar equipos / calibración para mi empresa.') }}" target="_blank" rel="noopener noreferrer" class="fixed bottom-6 right-6 z-50 group flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white p-3.5 sm:px-4 sm:py-3 rounded-full shadow-2xl hover:shadow-emerald-500/50 transition-all duration-300 transform hover:scale-105" title="Chatear por WhatsApp con un Especialista">
        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
        <span class="hidden sm:inline font-bold text-sm tracking-wide">Atención B2B WhatsApp</span>
    </a>

    {{-- Footer Corporativo B2B Profesional --}}
    <footer class="bg-slate-950 text-slate-300 pt-16 pb-10 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800">
                <!-- Brand Statement -->
                <div class="lg:col-span-2 space-y-4">
                    <img src="{{ $siteSettings->logo_url ?? asset('images/logo.png') }}"
                         alt="{{ $siteSettings->site_name ?? 'Enjoy Safety Group' }}"
                         class="w-auto brightness-0 invert"
                         style="height: {{ min($siteSettings->logo_height ?? 40, 48) }}px;">
                    <p class="text-sm text-slate-400 leading-relaxed max-w-sm">
                        Líderes en detección industrial de gases, sistemas de protección de flama, renta de equipos conectados, calibración acreditada bajo la norma <strong>ISO/IEC 17025</strong> y salud visual empresarial con <strong>Enjoy Vision</strong> en todo México.
                    </p>
                    <div class="pt-2 flex items-center gap-3">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-950 border border-emerald-800 text-emerald-400 text-xs font-semibold">
                            ✓ Laboratorio Acreditado ISO 17025
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-950 border border-amber-800 text-amber-400 text-xs font-semibold">
                            ✓ Certificación ANSI Z87.1
                        </span>
                    </div>
                    @if(!empty($siteSettings->linkedin_url) || !empty($siteSettings->facebook_url))
                        <div class="pt-3 flex items-center gap-4">
                            @if(!empty($siteSettings->linkedin_url))
                                <a href="{{ $siteSettings->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-amber-400 transition" title="LinkedIn">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                </a>
                            @endif
                            @if(!empty($siteSettings->facebook_url))
                                <a href="{{ $siteSettings->facebook_url }}" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-amber-400 transition" title="Facebook">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                                </a>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Navigation Services -->
                <div>
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Soluciones</h3>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li><a href="{{ route('service.show', 'equipos-deteccion-gases') }}" class="hover:text-amber-400 transition">Detección de Gases</a></li>
                        <li><a href="{{ route('service.show', 'renta-detectores-conectados') }}" class="hover:text-amber-400 transition">Renta de Detectores</a></li>
                        <li><a href="{{ route('service.show', 'laboratorio-calibracion-iso17025') }}" class="hover:text-amber-400 transition">Calibración ISO 17025</a></li>
                        <li><a href="{{ route('service.show', 'optica-movil-in-situ') }}" class="hover:text-amber-400 transition">Óptica Móvil In-Situ</a></li>
                        <li><a href="{{ route('service.show', 'lentes-seguridad-prescripcion') }}" class="hover:text-amber-400 transition">Lentes de Seguridad</a></li>
                        <li><a href="{{ route('service.show', 'campanas-salud-visual-empresas') }}" class="hover:text-amber-400 transition">Campañas Visuales</a></li>
                    </ul>
                </div>

                <!-- Commercial & Catalog -->
                <div>
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Catálogo y Marcas</h3>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li><a href="{{ route('catalog') }}?category=detectores-portatiles" class="hover:text-amber-400 transition">Detectores Portátiles</a></li>
                        <li><a href="{{ route('catalog') }}?category=deteccion-fija-flama" class="hover:text-amber-400 transition">Detección Fija & Flama</a></li>
                        <li><a href="{{ route('catalog') }}?category=tubos-colorimetricos" class="hover:text-amber-400 transition">Tubos KwikDraw H2S</a></li>
                        <li><a href="{{ route('catalog') }}?category=lentes-seguridad-graduados" class="hover:text-amber-400 transition">Armazones Armourx</a></li>
                        <li><a href="{{ route('catalog') }}" class="hover:text-amber-400 transition">Ver Catálogo Completo</a></li>
                    </ul>
                </div>

                <!-- Contact & Legal -->
                <div>
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Contacto Directo</h3>
                    <ul class="space-y-3 text-sm text-slate-400">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-amber-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            <span>{{ $siteSettings->address ?? 'Atención a nivel nacional. Laboratorio y oficinas corporativas en México.' }}</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-amber-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <a href="tel:{{ $siteSettings->phone1_clean ?? '+525541697780' }}" class="hover:text-amber-400 transition">{{ $siteSettings->phone_1 ?? '+52 55 4169 7780' }}</a>
                            @if(!empty($siteSettings->phone_2))
                                <span class="text-slate-600">|</span>
                                <a href="tel:{{ $siteSettings->phone2_clean }}" class="hover:text-amber-400 transition">{{ $siteSettings->phone_2 }}</a>
                            @endif
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-amber-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <a href="mailto:{{ $siteSettings->contact_email ?? 'contacto@enjoysafety.com.mx' }}" class="hover:text-amber-400 transition">{{ $siteSettings->contact_email ?? 'contacto@enjoysafety.com.mx' }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Copyright & Legal Compliance -->
            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500 gap-4">
                <div>
                    &copy; {{ date('Y') }} {{ $siteSettings->site_name ?? 'Enjoy Safety Group S.A. de C.V.' }} Todos los derechos reservados.
                </div>
                <div class="flex items-center gap-6">
                    <a href="{{ route('privacy') }}" class="hover:text-slate-300 transition">Aviso de Privacidad (LFPDPPP)</a>
                    <span>•</span>
                    <a href="{{ route('terms') }}" class="hover:text-slate-300 transition">Términos y Condiciones B2B</a>
                    <span>•</span>
                    <a href="/admin" class="hover:text-slate-300 transition">Acceso Administrador</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
