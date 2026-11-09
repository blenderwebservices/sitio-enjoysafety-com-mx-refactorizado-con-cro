# Enjoy Safety México — Landing Page & Plataforma B2B Optimizada con CRO

> **Propuesta de Reemplazo y Modernización de la Landing Page Original de [enjoysafety.com.mx](https://enjoysafety.com.mx)**  
> Desarrollado bajo la arquitectura **Laravel 13**, **FilamentPHP v3** y base de datos **SQLite**.

---

## 🎯 Objetivo de esta Aplicación

Esta aplicación es una **propuesta integral de reemplazo y modernización de la landing page original de Enjoy Safety México**. Su objetivo principal es transformar un sitio web previo (desplegado sobre una plantilla e-commerce genérica de Odoo) en una **plataforma digital B2B de altísima conversión**, adaptada al perfil de los tomadores de decisiones de la industria en México:

- Gerentes de Seguridad, Higiene y Medio Ambiente (**EHS / HSE**).
- Directores y Superintendentes de Planta.
- Jefes de Compras, Abastecimiento y Mantenimiento Industrial.
- Directores Médicos Laborales y de Recursos Humanos.

La plataforma consolida con claridad comercial y técnica las tres divisiones estratégicas de **Enjoy Safety Group**:

1. **Enjoy Safety:** Detección fija y portátil de gases, sistemas de protección de flama, telemetría conectada y renta para paros de planta (con fabricantes líderes como Blackline Safety, Teledyne, Detcon, GMI, Simtronics, KwikDraw, DwyerOmega, etc.).
2. **ES Labs:** Laboratorio Acreditado conforme a la norma internacional **ISO/IEC 17025** para calibración de detectores de gas con trazabilidad metrológica (CENAM / NIST) para auditorías de la STPS y Protección Civil.
3. **Enjoy Vision:** Salud visual ocupacional in-situ mediante **Óptica Móvil** (camión clínico automatizado con tecnología Vision-S 700), campañas empresariales y suministro de **lentes de seguridad graduados certificados** (Armourx / ANSI Z87.1 / NOM-017-STPS).

---

## 🔍 Diagnóstico del Sitio Original (Problemas Detectados)

Previo a este desarrollo, se realizó una auditoría CRO exhaustiva documentada en [`/docs/analisis-cro-v1.md`](docs/analisis-cro-v1.md), la cual detectó deficiencias críticas que destruían la tasa de conversión en el sitio original:

1. **Contaminación Crítica de Plantilla Odoo:** El megamenú exhibía categorías ajenas a la seguridad industrial (*"Laptops, Computadoras de escritorio, Monitores, iPhone, Audio para el hogar"*). El pie de página conservaba textos dummy (*"Más de 50,000 clientes confían en Ópticas XYZ"*, dirección ficticia en CDMX, teléfono estadounidense `+1 555-555-5556` y correo `info@opticaejemplo.com`).
2. **Desconexión Total en el Hero:** Encabezado pasivo sin propuesta de valor explícita ni llamado a la acción comercial (el único botón realizaba un scroll descendente).
3. **Inexistencia de un Embudo B2B (RFQ):** El único punto de contacto era un formulario genérico con preguntas en inglés (*"Is the website user-friendly?"*) sin capacidad para cotizar requerimientos técnicos (gases, paros de planta o número de colaboradores).
4. **Catálogo Caótico:** Mezcla de armazones de sol de lujo (Philipp Plein) con tubos colorimétricos industriales de ácido sulfhídrico ($H_2S$), desorientando a los compradores técnicos.
5. **Fricción Lingüística (Spanglish):** Rutas forzadas en `/en` y textos en inglés con faltas ortográficas (*"Data Managment"*).
6. **Ausencia de Canal de Urgencias:** Sin botón directo a WhatsApp ni tiempos garantizados de respuesta para emergencias en planta.

---

## 🚀 Cambios Realizados para el Cumplimiento de CRO (Conversion Rate Optimization)

Para revertir la fuga de prospectos y maximizar el porcentaje de conversión de visitantes a cotizaciones calificadas, se implementaron las siguientes mejoras bajo los pilares de CRO:

### 1. Primera Impresión y Prueba de los 3 Segundos

- **H1 Enfocado en Beneficios y Solución:**  
  *«Detección de Gases, Calibración ISO 17025 y Salud Visual Industrial»*  
  Comunica de manera inmediata qué hace la empresa y qué valor aporta a la industria.
- **Subtítulo con Propuesta de Valor Integral:**  
  Explica claramente que blindamos operaciones críticas mediante tecnología líder internacional, renta conectada y atención in-situ con Óptica Móvil en todo México.
- **Jerarquía Visual de Doble CTA:**
  - **CTA Primario (Alto Contraste):** Botón ámbar destacado (*"Solicitar Cotización Inmediata"*), dirigido al comprador con urgencia o necesidad de presupuesto formal.
  - **CTA Secundario (Outline/Ghost):** (*"Explorar Catálogo y Marcas"*), dirigido al usuario en fase exploratoria o de especificación técnica.
- **Barra de Confianza Inmediata (Above the Fold):**  
  Carrusel visual con las 12 marcas de prestigio internacional representadas junto al distintivo oficial de **Laboratorio Acreditado ISO/IEC 17025**.

### 2. Embudo Inteligente de Cotización B2B (Smart RFQ Generator)

- Reemplazo del formulario genérico por un **Cotizador Inteligente B2B** (`#cotizador-b2b`) en portada y en página dedicada de contacto.
- Permite seleccionar la solución técnica exacta:
  - *Calibración Acreditada ISO/IEC 17025 (ES Labs)*
  - *Renta de Detectores de Gas Conectados*
  - *Venta de Detectores Fijos / Portátiles y Tubos KwikDraw*
  - *Óptica Móvil Enjoy Vision In-Situ*
  - *Lentes de Seguridad Graduados (Armourx)*
  - *Campañas de Salud Visual para Empresas*
- Genera un **Folio Único de Seguimiento** (ej. `RFQ-20261104-XXXX`).
- Almacena el prospecto en SQLite en la tabla `quote_requests` y muestra confirmación inmediata con el compromiso de respuesta en **menos de 2 horas hábiles**.

### 3. Canal de Urgencias Industriales (WhatsApp B2B Flotante)

- En el mercado industrial mexicano, más del 70% de las urgencias (paros no programados, calibraciones de última hora o requerimientos de EHS) se canalizan vía mensajería instantánea.
- Se implementó un botón flotante permanente de WhatsApp con mensaje parametrizado para contactar directamente a un especialista técnico.

### 4. Segmentación del Catálogo y Fichas Técnicas

- Catálogo 100% industrial libre de productos de consumo masivo o gafas de diseñador.
- Filtros interactivos por **Categoría** (Detectores Portátiles, Fijos & Flama, Tubos Colorimétricos, Lentes de Seguridad, Drones) y por **Marca**.
- Especificaciones técnicas en pares clave-valor (gases detectados, certificaciones ATEX/IECEx, grado IP67).
- Botones de acción directa: *"Solicitar Cotización por Lote"* y vinculación automática al formulario con el nombre del equipo preseleccionado.

### 5. Autoridad, Prueba Social y Módulos Deep Dive

- **Módulo ES Labs (ISO/IEC 17025):** Explica la trazabilidad hacia CENAM y NIST, la validez ante auditorías de la STPS (NOM-005, NOM-010, NOM-033), SEMARNAT y Protección Civil, y los tiempos de entrega (estándar 3-5 días y exprés 24-48 hrs).
- **Módulo Enjoy Vision (Óptica Móvil):** Muestra fotografías reales del camión adaptado y del equipo optométrico computarizado Vision-S 700, enfatizando el beneficio de **cero ausentismo laboral** para la empresa.
- **Sectores Industriales Clave:** Tarjetas dedicadas a Petróleo & Gas, Espacios Confinados, Emisiones de Metano, Hidrógeno, Generación de Energía y Minería.
- **Prueba Social Industrial Verídica:** Testimonios de gerentes EHS de complejos petroquímicos, directores de salud ocupacional del sector automotriz y superintendentes de minería.
- **Acordeón FAQ Anti-Objeciones:** Resuelve dudas frecuentes de compradores técnicos (acreditación, esquemas de nómina, cobertura geográfica y contratos de renta).

### 6. Cumplimiento Legal y Confianza Corporativa

- Erradicación absoluta de datos dummy ("Ópticas XYZ", correos ficticios y teléfonos falsos).
- Inclusión del **Aviso de Privacidad Integral** conforme a la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (**LFPDPPP**).
- Inclusión de los **Términos y Condiciones Comerciales B2B**.

---

## 🛠️ Arquitectura Tecnológica

- **Framework Backend:** Laravel 13 (PHP 8.4)
- **Panel Administrativo:** FilamentPHP v3.3 (Livewire 3)
- **Base de Datos:** SQLite (`database/database.sqlite`), ligera, portable y ultra-veloz.
- **Diseño & UI:** Tailwind CSS v4 con paleta institucional industrial (Azul marino de seguridad `#0b2545`, Amarillo de advertencia `#f59e0b`, Verde de calibración `#10b981`).
- **Interactividad Frontend:** Alpine.js para acordeones, menús móviles y modales.
- **Compilador de Assets:** Vite.

---

## ⚙️ Panel de Administración FilamentPHP (`/admin`)

La plataforma cuenta con un panel administrativo completo para la operación comercial de Enjoy Safety Group:

- **Ruta:** `/admin`
- **Usuario Administrador:** `admin@enjoysafety.com.mx`
- **Contraseña:** `EnjoySafety2026!`

### Módulos del Panel

- **Gestión Comercial (`QuoteRequestResource`):**
  - Bandeja de entrada de cotizaciones con folios únicos.
  - Badges de estado: *Nuevo Lead (Rojo), Contactado (Amarillo), En Cotización (Azul), Ganado (Verde), Archivado (Gris)*.
  - Filtros por estado y por tipo de solución.
  - Campo para notas internas de seguimiento entre agentes de ventas e ingenieros de soporte.
- **Catálogo Industrial (`ProductResource`):**
  - Altas, bajas y modificaciones de equipos con especificaciones técnicas (JSON key-value), imágenes y marcas asociadas.
- **Marcas Representadas (`BrandResource`):**
  - Gestión de los 12 fabricantes internacionales y sus logotipos.
- **Servicios y Soluciones (`ServiceResource`):**
  - Edición de descripciones, sectores objetivo y características de las divisiones.
- **Preguntas Frecuentes (`FaqResource`):**
  - Gestión y ordenamiento de FAQs orientadas al derribo de objeciones.
- **Widget de Estadísticas CRO (`StatsOverview`):**
  - Métricas en tiempo real de leads sin atender, cotizaciones activas y equipos en catálogo.

---

## 🧪 Pruebas Automatizadas

El proyecto incluye una suite de pruebas con **PHPUnit** en `tests/Feature/SiteTest.php` que valida:

- Carga de la landing page con todos los elementos CRO y ausencia total de textos dummy.
- Filtrado y búsqueda en el catálogo.
- Carga de las páginas de detalle de los 6 servicios.
- Formulario de contacto y envío de cotización con persistencia en SQLite y generación de folio.
- Carga de páginas legales (Aviso de Privacidad LFPDPPP y Términos).
- Acceso autenticado al panel Filament y carga de sus recursos.

Para ejecutar las pruebas:

```bash
php artisan test
```

**Resultado actual:**

```
PASS  Tests\Feature\SiteTest
✓ test_home_page_loads_with_cro_elements
✓ test_catalog_page_loads_and_filters
✓ test_service_detail_pages_load
✓ test_contact_page_loads
✓ test_quote_request_submission_saves_to_database
✓ test_legal_pages_load
✓ test_filament_admin_login_loads
✓ test_filament_admin_panel_authenticated_access

Tests:    9 passed (47 assertions)
Duration: 1.83s
```

---

## 🚀 Puesta en Marcha Local

### 1. Requisitos Previos

- PHP 8.2 o superior (con extensiones `pdo_sqlite` y `sqlite3`).
- Composer 2.x.
- Node.js 18+ y NPM.

### 2. Instalación y Configuración

```bash
# 1. Instalar dependencias PHP
composer install

# 2. Instalar dependencias de frontend
npm install

# 3. Compilar assets de Tailwind y Alpine
npm run build

# 4. Crear archivo SQLite y ejecutar migraciones con datos iniciales
touch database/database.sqlite
php artisan migrate --seed

# 5. Iniciar servidor de desarrollo
php artisan serve
```

El sitio estará disponible en:

- **Frontend Público:** [http://localhost:8000](http://localhost:8000)
- **Panel Administrativo:** [http://localhost:8000/admin](http://localhost:8000/admin)

---

## 📁 Documentación de Soporte

En la carpeta [`docs/`](docs/) se encuentran los reportes técnicos complementarios:

- [`docs/analisis-cro-v1.md`](docs/analisis-cro-v1.md): Auditoría CRO detallada del sitio original bajo los 5 pilares de conversión.
- [`docs/2026-11-04_14-30_implementation_plan.md`](docs/2026-11-04_14-30_implementation_plan.md): Plan de ejecución técnica del clonado.
- [`docs/2026-11-04_14-48_walkthrough.md`](docs/2026-11-04_14-48_walkthrough.md): Reporte de entrega y walkthrough de la refactorización.

---
&copy; 2026 Enjoy Safety Group S.A. de C.V. — Propuesta de Modernización y Optimización CRO.
