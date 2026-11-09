# Implementation Plan - Aplicación Integral de Recomendaciones CRO (analisis-cro-v1.md)

**Fecha:** 2026-11-05 18:48  
**Documento Base:** `docs/analisis-cro-v1.md`  
**Objetivo:** Aplicar de forma exhaustiva y rigurosa todas las recomendaciones de optimización de la tasa de conversión (CRO) del documento de auditoría, incluyendo la arquitectura progresiva de servicios destacados y carga por lotes de 3 con scroll infinito en el frontend.

---

## 1. Alcance y Mejoras CRO Específicas

### A. Campo `is_featured` en `services` y Progressive Disclosure
1. **Migración & Modelo:**
   - Añadir columna `is_featured` (boolean, default true/false) a la tabla `services`.
   - Actualizar el modelo `App\Models\Service` con `$casts = ['is_featured' => 'boolean']`.
   - Actualizar el seeder `DatabaseSeeder.php` marcando los servicios insignia como destacados:
     - *Equipos de Detección de Gases* (Destacado)
     - *Laboratorio Acreditado ISO/IEC 17025 - ES Labs* (Destacado)
     - *Óptica Móvil Enjoy Vision In-Situ / a Empresas* (Destacado)
     - Los servicios restantes (*Renta de Detectores Conectados*, *Lentes de Seguridad Graduados*, *Campañas de Salud Visual*) disponibles para carga bajo demanda.
   - Actualizar `ServiceResource` en FilamentPHP para que el administrador pueda marcar/desmarcar servicios destacados desde `/admin`.

2. **Frontend Interactivo (Alpine.js + Infinite Scroll / Batch Loading de 3 en 3):**
   - En `resources/views/pages/home.blade.php`:
     - Mostrar inicialmente los 3 servicios destacados.
     - Botón llamativo con micro-animación: *"Ver resto de soluciones especializadas (3 más)"*.
     - Al hacer clic, se activa el modo de revelación progresiva y se cargan los siguientes 3 servicios con scroll suave y observador de intersección (infinite scroll) para el resto de elementos si hubiera más.
     - Badges de diferenciación de división (*Enjoy Safety*, *ES Labs Acreditado*, *Enjoy Vision Atención In-Situ*).

### B. Perfeccionamiento del Hero y Prueba de los 3 Segundos
- H1 con propuesta de valor de alto impacto orientada a beneficios industriales.
- Barra de confianza con los 12 fabricantes internacionales y sello de Acreditación ISO/IEC 17025 con micro-tooltip explicativo de trazabilidad CENAM/NIST.
- Indicador en vivo de tiempo de respuesta garantizado: *"Cotización formal en menos de 2 horas hábiles"*.

### C. Smart RFQ B2B (Cotizador Dinámico Multietapa)
- Formulario de cotización inteligente con selector dinámico de servicio que adapta los campos:
  - Si selecciona *Calibración ISO 17025*: muestra opciones de tipo de servicio (Estándar 3-5 días o Exprés 24-48 hrs) y número de detectores.
  - Si selecciona *Renta Conectada*: muestra duración estimada (días/meses) y paros de planta.
  - Si selecciona *Óptica Móvil / Salud Visual*: muestra número estimado de trabajadores y turnos en planta.
- Retroalimentación instantánea y generación de folio único.

### D. Casos de Estudio y Métricas Verificables de Conversión
- Reemplazo de testimonios genéricos por casos de estudio cuantitativos:
  - *Petroquímica del Golfo:* 0 incidentes con 80+ trabajadores monitoreados en tiempo real.
  - *Grupo Automotriz:* 320 colaboradores evaluados in-situ con la Óptica Móvil ahorrando 1,280 horas hombre.
  - *Compañía Minera:* 100% de aprobación en auditorías federales de la STPS con calibración ES Labs.

### E. Módulo Interactivo de Derribo de Objeciones (FAQs Filtrables)
- Filtro por categoría de objeción (Calibración, Renta, Óptica Móvil, Cobertura).

---

## 2. Fases de Ejecución

1. **Migración y Base de Datos:**
   - Crear migración `add_is_featured_to_services_table`.
   - Ejecutar migración y actualizar `Service.php` y `DatabaseSeeder.php`.
   - Actualizar `ServiceResource.php` en Filament.
2. **Controlador y Rutas:**
   - En `SiteController.php`, consultar `$featuredServices` y `$otherServices` o pasar la colección completa estructurada para consumo de Alpine.js.
3. **Frontend Blade + Alpine.js:**
   - Implementar el componente reactivo de servicios destacados + botón "Ver resto de soluciones" con carga en grupos de 3 y scroll infinito.
   - Refinar el Cotizador Inteligente y los badges de confianza.
4. **Pruebas y Verificación:**
   - Compilar assets (`npm run build`).
   - Ejecutar `php artisan test` con nuevas pruebas que validen la presencia de servicios destacados y la carga del resto.
5. **Documentación:**
   - Reporte de entrega en `docs/YYYY-MM-DD_HH-mm_walkthrough.md`.

