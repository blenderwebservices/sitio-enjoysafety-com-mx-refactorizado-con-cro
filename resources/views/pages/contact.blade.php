@extends('layouts.app')

@section('title', 'Contacto y Cotizaciones B2B | Enjoy Safety México')
@section('meta_description', 'Contacte a Enjoy Safety Group para cotizaciones de detectores de gas, calibración ISO 17025 y óptica móvil en todo México. Respuesta en < 2 horas.')

@section('content')

<div class="bg-slate-900 text-white py-16 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-3xl">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-500/20 text-amber-400 text-xs font-bold border border-amber-500/30 mb-3">
            Atención Inmediata a Nivel Nacional
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Contacto & Cotizaciones B2B</h1>
        <p class="text-slate-300 text-sm sm:text-base mt-3">
            Estamos listos para blindar la seguridad de su planta y cuidar la salud visual de sus trabajadores. Respuesta garantizada en menos de 2 horas hábiles.
        </p>
    </div>
</div>

<div class="py-16 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Contact Channels & Info -->
            <div class="lg:col-span-5 space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm space-y-6">
                    <h2 class="text-xl font-bold text-slate-900">Canales Directos de Atención</h2>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-slate-400 uppercase">Atención Telefónica</div>
                            <a href="tel:+525541697780" class="text-base font-bold text-slate-900 hover:text-amber-600 transition">+52 55 4169 7780</a>
                            <p class="text-xs text-slate-500 mt-0.5">Lunes a Viernes de 8:00 a 18:00 hrs</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-slate-400 uppercase">WhatsApp Corporativo</div>
                            <a href="https://wa.me/525541697780" target="_blank" class="text-base font-bold text-emerald-700 hover:text-emerald-800 transition">+52 55 4169 7780</a>
                            <p class="text-xs text-slate-500 mt-0.5">Atención inmediata para urgencias en planta</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-slate-400 uppercase">Correo Comercial</div>
                            <a href="mailto:contacto@enjoysafety.com.mx" class="text-base font-bold text-slate-900 hover:text-amber-600 transition">contacto@enjoysafety.com.mx</a>
                            <p class="text-xs text-slate-500 mt-0.5">Envío de bases de licitación y fichas</p>
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-4 flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></div>
                        <span class="text-xs text-slate-600 font-medium">ES Labs - Laboratorio Acreditado ISO/IEC 17025</span>
                    </div>
                </div>

                <!-- Coverage Card -->
                <div class="bg-slate-900 text-white rounded-2xl p-6 border border-slate-800 shadow-sm">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-amber-400 mb-2">Cobertura Nacional</h3>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        Enviamos equipos y tubos colorimétricos a cualquier parque industrial de México vía paquetería exprés asegurada. Coordinamos la visita de la <strong>Óptica Móvil Enjoy Vision</strong> en plantas automotrices, maquiladoras y complejos petroquímicos.
                    </p>
                </div>
            </div>

            <!-- RFQ Form Column -->
            <div class="lg:col-span-7">
                <div class="bg-white rounded-2xl border border-slate-200 p-8 sm:p-10 shadow-sm">
                    <h2 class="text-2xl font-bold text-slate-900 mb-2">Formulario de Requerimiento Técnico</h2>
                    <p class="text-xs text-slate-500 mb-6">Complete los campos requeridos para que un ingeniero especializado elabore su cotización formal.</p>

                    <form action="{{ route('quote.submit') }}" method="POST" class="space-y-5">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="full_name" class="block text-xs font-bold text-slate-700 uppercase mb-1">Nombre Completo *</label>
                                <input type="text" name="full_name" id="full_name" required value="{{ old('full_name') }}" placeholder="Ing. Roberto Garza" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-amber-500 focus:outline-none">
                            </div>
                            <div>
                                <label for="company" class="block text-xs font-bold text-slate-700 uppercase mb-1">Empresa / Planta *</label>
                                <input type="text" name="company" id="company" required value="{{ old('company') }}" placeholder="Industrias del Centro S.A." class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-amber-500 focus:outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="email" class="block text-xs font-bold text-slate-700 uppercase mb-1">Correo Electrónico *</label>
                                <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="rgarza@empresa.com" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-amber-500 focus:outline-none">
                            </div>
                            <div>
                                <label for="phone" class="block text-xs font-bold text-slate-700 uppercase mb-1">Teléfono Directo / WhatsApp *</label>
                                <input type="tel" name="phone" id="phone" required value="{{ old('phone') }}" placeholder="55 9876 5432" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-amber-500 focus:outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="role" class="block text-xs font-bold text-slate-700 uppercase mb-1">Cargo / Puesto</label>
                                <input type="text" name="role" id="role" value="{{ old('role') }}" placeholder="Gerente de Seguridad e Higiene" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-amber-500 focus:outline-none">
                            </div>
                            <div>
                                <label for="service_type" class="block text-xs font-bold text-slate-700 uppercase mb-1">Solución de Interés *</label>
                                <select name="service_type" id="service_type" required class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-amber-500 focus:outline-none">
                                    <option value="">Seleccione una opción...</option>
                                    <option value="calibracion_iso17025" {{ ($selectedService === 'laboratorio-calibracion-iso17025' || old('service_type') === 'calibracion_iso17025') ? 'selected' : '' }}>Calibración ISO/IEC 17025 (ES Labs)</option>
                                    <option value="renta_detectores" {{ ($selectedService === 'renta-detectores-conectados' || old('service_type') === 'renta_detectores') ? 'selected' : '' }}>Renta de Detectores de Gas</option>
                                    <option value="equipos_fijos_portatiles" {{ ($selectedService === 'equipos-deteccion-gases' || old('service_type') === 'equipos_fijos_portatiles') ? 'selected' : '' }}>Venta de Detectores y Tubos KwikDraw</option>
                                    <option value="optica_movil" {{ ($selectedService === 'optica-movil-in-situ' || old('service_type') === 'optica_movil') ? 'selected' : '' }}>Óptica Móvil Enjoy Vision In-Situ</option>
                                    <option value="lentes_prescripcion" {{ ($selectedService === 'lentes-seguridad-prescripcion' || old('service_type') === 'lentes_prescripcion') ? 'selected' : '' }}>Lentes de Seguridad Graduados</option>
                                    <option value="campana_salud_visual" {{ ($selectedService === 'campanas-salud-visual-empresas' || old('service_type') === 'campana_salud_visual') ? 'selected' : '' }}>Campaña de Salud Visual</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="equipment_interest" class="block text-xs font-bold text-slate-700 uppercase mb-1">Equipos o Cantidad Aproximada</label>
                            <input type="text" name="equipment_interest" id="equipment_interest" value="{{ request('equipo') ?? old('equipment_interest') }}" placeholder="Ej. 12 detectores portátiles o 200 lentes graduados" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-amber-500 focus:outline-none">
                        </div>

                        <div>
                            <label for="details" class="block text-xs font-bold text-slate-700 uppercase mb-1">Descripción del Requerimiento</label>
                            <textarea name="details" id="details" rows="4" placeholder="Indique gases a detectar, fechas estimadas de entrega, lugar de entrega o particularidades técnicas..." class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-amber-500 focus:outline-none">{{ old('details') }}</textarea>
                        </div>

                        <div class="flex items-start gap-2 pt-2">
                            <input type="checkbox" id="privacy_agree" required class="mt-1 w-4 h-4 rounded text-amber-500 border-slate-300 focus:ring-amber-500">
                            <label for="privacy_agree" class="text-xs text-slate-500">
                                He leído y acepto el <a href="{{ route('privacy') }}" target="_blank" class="text-amber-600 underline">Aviso de Privacidad</a> de Enjoy Safety Group.
                            </label>
                        </div>

                        <button type="submit" class="w-full py-3.5 rounded-xl bg-amber-500 hover:bg-amber-600 text-slate-950 font-extrabold text-sm shadow-md transition transform hover:-translate-y-0.5">
                            Enviar Solicitud de Cotización Inmediata
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
