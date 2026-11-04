# Implementation Plan - Clonado y Optimización CRO de Enjoy Safety con FilamentPHP y SQLite

**Fecha:** 2026-11-04 14:30  
**Archivo de Referencia CRO:** `docs/analisis-cro-v1.md`  
**Sitio Origen:** [https://enjoysafety.com.mx](https://enjoysafety.com.mx)  
**Stack Tecnológico:** Laravel 11/12, FilamentPHP v3, Livewire 3, Tailwind CSS, Alpine.js, Base de Datos SQLite.

---

## 1. Objetivos del Proyecto

1. **Clonar con Alta Fidelidad y Refactorizar con CRO:**
   - Clonar la estructura completa, identidad visual, divisiones de negocio (Enjoy Safety, ES Labs, Enjoy Vision), catálogo de equipos, marcas y servicios de `enjoysafety.com.mx`.
   - Erradicar por completo los defectos críticos de la plantilla Odoo identificados en `/docs/analisis-cro-v1.md` (textos dummy de "Ópticas XYZ", categorías de computadoras/monitores/laptops, correos y teléfonos ficticios de EE.UU.).
2. **Arquitectura FilamentPHP + SQLite:**
   - Base de datos SQLite ligera, ultra-rápida y portable (`database/database.sqlite`).
   - Panel administrativo completo bajo Filament v3 (`/admin`) con autenticación, dashboard de KPIs de conversión y recursos administrativos para gestionar:
     - **Cotizaciones / Leads B2B (`QuoteRequestResource`)**: Estados de atención (Nuevo, En Revisión, Cotizado, Cerrado), exportación y seguimiento.
     - **Catálogo de Productos (`ProductResource`)**: Equipos portátiles, fijos, tubos colorimétricos, lentes de seguridad y fichas técnicas.
     - **Marcas Aliadas (`BrandResource`)**: Blackline Safety, Teledyne, Detcon, Simtronics, KwikDraw, Armourx, etc.
     - **Servicios (`ServiceResource`)**: Detección, Calibración ISO 17025, Renta Conectada, Lentes con Prescripción, Óptica Móvil, Campañas.
     - **Preguntas Frecuentes (`FaqResource`)**: FAQs orientadas a derribar objeciones de compra.
3. **Optimización Extrema de Conversión B2B:**
   - **Hero Section de Alta Conversión**: H1 enfocado en beneficios, propuesta de valor clara, doble CTA jerarquizado y barra de marcas + acreditación ISO/IEC 17025.
   - **Cotizador Inteligente / RFQ Interactivo**: Formulario por pasos (selección de requerimiento, especificaciones de equipos o colaboradores, contacto empresarial) conectado en tiempo real con la base de datos SQLite.
   - **WhatsApp B2B Flotante**: Canal de atención inmediata con mensaje parametrizado por servicio.
   - **Prueba Social Industrial Verídica**: Casos de éxito y testimonios de Jefes de Seguridad e Higiene (EHS).
   - **Cumplimiento Legal**: Aviso de Privacidad Integral conforme a la ley mexicana LFPDPPP y Términos de Servicio.

---

## 2. Fases de Ejecución

### Fase 1: Inicialización del Proyecto Laravel y Configuración de SQLite
- Instalar o inicializar Laravel en el espacio de trabajo.
- Configurar `.env` con conexión `sqlite` y crear `database/database.sqlite`.
- Instalar FilamentPHP v3 (`composer require filament/filament`).
- Instalar panel de Filament (`php artisan filament:install --panels`).
- Configurar Tailwind CSS, Alpine.js y Vite.

### Fase 2: Modelos, Migraciones y Seeders
- Crear migraciones para:
  - `quote_requests` (id, folio, full_name, email, phone, company, service_type, equipment_interest, comments, status, notes, timestamps).
  - `brands` (id, name, slug, logo_path, description, website_url, order, is_active, timestamps).
  - `products` (id, name, slug, sku, brand_id, category, description, technical_specs, price, is_quote_only, image_path, datasheet_url, is_featured, timestamps).
  - `services` (id, name, slug, tagline, description, icon, image_path, features, target_industries, timestamps).
  - `faqs` (id, question, answer, category, order, is_active, timestamps).
  - `testimonials` (id, client_name, position, company, industry, content, rating, timestamps).
- Crear un `DatabaseSeeder` exhaustivo con:
  - Usuario administrador de Filament.
  - Las 12 marcas internacionales descargadas con sus logotipos locales.
  - Los productos y tubos KwikDraw, detectores Blackline, Teledyne y armazones Armourx.
  - Los 6 servicios con especificaciones técnicas detalladas.
  - FAQs de alto impacto orientadas a compradores industriales.
  - Testimonios realistas de directores EHS y gerentes de planta.

### Fase 3: Recursos y Panel de Control FilamentPHP v3
- Generar recursos de Filament:
  - `QuoteRequestResource`: Visualización con badges de estado, filtros por servicio/fecha, visualizador de datos de contacto y notas internas.
  - `ProductResource`: Gestión con soporte para specs técnicas, imágenes y marcas asociadas.
  - `BrandResource`: Administración de fabricantes asociados.
  - `ServiceResource`: Edición de las propuestas de servicio.
  - `FaqResource`: Ordenamiento y publicación de FAQs.
- Personalizar el panel Filament con el branding corporativo de Enjoy Safety (colores, logo, tipografía).

### Fase 4: Vistas Públicas de Alta Conversión (Blade + Tailwind + Alpine)
- Layout principal `components/layouts/app.blade.php`:
  - Header corporativo limpio (sin computadoras ni laptops dummy). Menú: Inicio, Soluciones, Detección de Gases, Calibración ISO 17025, Renta, Enjoy Vision (Óptica Móvil & Lentes), Catálogo, Contacto.
  - Botón CTA destacado en cabecera: *"Cotizar Proyecto"*.
  - Footer profesional B2B con datos corporativos de México, enlaces de interés, links legales y sellos de confianza.
  - Botón flotante de WhatsApp B2B interactivo.
- Landing Page (`resources/views/pages/home.blade.php`):
  - Hero Section B2B con H1 contundente y prueba de los 3 segundos.
  - Cinta de confianza: Marcas internacionales y acreditación ISO/IEC 17025.
  - Cuadrícula de las 6 Soluciones Especializadas con enlaces directos a cotización.
  - Sección ES Labs: Calibración Acreditada con trazabilidad para auditorías.
  - Sección Enjoy Vision: Óptica Móvil (camión especializado) y lentes con prescripción.
  - Sección Mercados e Industrias críticas (Oil & Gas, Minería, Hidrógeno, Metano, Espacios Confinados).
  - Catálogo Destacado con filtrado interactivo (Alpine.js).
  - Cotizador Inteligente B2B (Livewire / Formulario interactivo con feedback inmediato).
  - Sección de Testimonios y Prueba Social.
  - Acordeón de FAQs para derribar objeciones.
- Páginas complementarias:
  - `/servicios/{slug}`: Páginas detalladas por solución.
  - `/catalogo`: Catálogo completo de equipos y tubos colorimétricos con filtro y buscador.
  - `/contacto`: Formulario de contacto corporativo con tiempo de respuesta prometido < 2 horas.
  - `/aviso-de-privacidad`: Aviso de privacidad integral conforme a la ley mexicana LFPDPPP.
  - `/terminos`: Términos de servicio comercial B2B.

### Fase 5: Integración de Assets y Estilos
- Copiar las imágenes descargadas de `scraped_assets` hacia `public/images/`.
- Configurar paleta de colores oficial de Enjoy Safety (Azul marino de seguridad industrial `#0b2545`, Amarillo/Naranja de alerta de seguridad `#f59e0b` / `#ea580c`, Verde de calibración aprobada `#10b981`, Gris técnico `#f8fafc`).
- Compilar assets con Vite (`npm run build`).

### Fase 6: Pruebas y Verificación
- Verificar ejecución de migraciones y seeders sin errores en SQLite.
- Probar el flujo completo de envío de cotizaciones desde el Cotizador B2B y verificar que se registre en la tabla `quote_requests`.
- Probar el acceso y navegación en el panel de Filament (`/admin`).
- Probar responsividad móvil (Smartphones, Tablets y Escritorio).
- Verificar que ninguna palabra ni elemento dummy de la plantilla Odoo persista.

---

## 3. Criterios de Aceptación

- [x] Documento de auditoría CRO detallado guardado en `docs/analisis-cro-v1.md`.
- [x] Plan de implementación guardado en `docs/2026-11-04_14-30_implementation_plan.md`.
- [ ] Aplicación Laravel 11/12 funcionando con base de datos SQLite.
- [ ] Panel administrativo Filament v3 funcional en `/admin` con credenciales de prueba documentadas.
- [ ] Catálogo de productos y marcas de Enjoy Safety importados y navegables.
- [ ] Formulario de cotización B2B operativo que guarda solicitudes en la base de datos y muestra confirmación instantánea.
- [ ] Sitio 100% en español de México, con branding profesional, teléfono de México y WhatsApp de contacto.
- [ ] Documento de entrega walkthrough al finalizar en `docs/YYYY-MM-DD_HH-mm_walkthrough.md`.

