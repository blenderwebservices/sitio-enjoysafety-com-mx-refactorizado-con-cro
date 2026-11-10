<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Product;
use App\Models\QuoteRequest;
use App\Models\QuoteRequestNote;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Super Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@enjoysafety.com.mx'],
            [
                'name' => 'Director de Operaciones',
                'password' => Hash::make('EnjoySafety2026!'),
            ]
        );

        // 2. Categories
        $catPortatiles = Category::firstOrCreate(
            ['slug' => 'detectores-portatiles'],
            [
                'name' => 'Detectores Portátiles y Conectados',
                'description' => 'Equipos individuales para monitoreo de 1 a 5 gases con telemetría en tiempo real y detección de caídas.',
            ]
        );

        $catFijos = Category::firstOrCreate(
            ['slug' => 'deteccion-fija-flama'],
            [
                'name' => 'Detección Fija y Flama',
                'description' => 'Sistemas continuos para plantas petroquímicas, cuartos de bombas y almacenes clasificados.',
            ]
        );

        $catTubos = Category::firstOrCreate(
            ['slug' => 'tubos-colorimetricos'],
            [
                'name' => 'Tubos Colorimétricos KwikDraw',
                'description' => 'Muestreo puntual rápido de concentraciones de gases tóxicos y vapores orgánicos con bombas manuales.',
            ]
        );

        $catLentes = Category::firstOrCreate(
            ['slug' => 'lentes-seguridad-graduados'],
            [
                'name' => 'Lentes de Seguridad con Prescripción',
                'description' => 'Armazones de seguridad certificados bajo ANSI Z87.1 con micas graduadas monofocales y progresivas.',
            ]
        );

        $catDrones = Category::firstOrCreate(
            ['slug' => 'inspeccion-metano-drones'],
            [
                'name' => 'Inspección de Metano y Drones',
                'description' => 'Sensores avanzados para detección aérea de fugas de gas en ductos e instalaciones industriales.',
            ]
        );

        // 3. Brands
        $brandBlackline = Brand::firstOrCreate(
            ['slug' => 'blackline-safety'],
            [
                'name' => 'Blackline Safety',
                'logo_path' => 'images/Blackline_safety_Logo.webp',
                'description' => 'Líder mundial en seguridad conectada, monitoreo en tiempo real, detección de caídas y alertas SOS para trabajadores en campo.',
                'website_url' => 'https://www.blacklinesafety.com',
                'order' => 1,
            ]
        );

        $brandTeledyne = Brand::firstOrCreate(
            ['slug' => 'teledyne-gas-flame'],
            [
                'name' => 'Teledyne Gas & Flame Detection',
                'logo_path' => 'images/Teledyen_gas_and_Flame_Detection_Logo.png',
                'description' => 'Portafolio líder en detección fija y portátil de gases combustibles, tóxicos y sistemas de detección de flama óptica.',
                'website_url' => 'https://www.teledynegasandflame.com',
                'order' => 2,
            ]
        );

        $brandGmi = Brand::firstOrCreate(
            ['slug' => 'gmi-gas'],
            [
                'name' => 'GMI Gas',
                'logo_path' => 'images/GMI_gas_Logo.webp',
                'description' => 'Especialistas en detección de gas en utilities, gasoductos e instrumentación portátil para localización milimétrica de fugas.',
                'order' => 3,
            ]
        );

        $brandDetcon = Brand::firstOrCreate(
            ['slug' => 'detcon'],
            [
                'name' => 'Detcon',
                'logo_path' => 'images/Detcon__Logo.webp',
                'description' => 'Transmisores fijos de grado industrial y sensores inteligentes para ambientes marinos y áreas clasificadas.',
                'order' => 4,
            ]
        );

        $brandSimtronics = Brand::firstOrCreate(
            ['slug' => 'simtronics'],
            [
                'name' => 'Simtronics',
                'logo_path' => 'images/Simtronics_Logo.webp',
                'description' => 'Detectores ópticos de flama multiespectrales (UV/IR e IR3) para protección de alta velocidad en refinerías.',
                'order' => 5,
            ]
        );

        $brandKwikdraw = Brand::firstOrCreate(
            ['slug' => 'kwikdraw'],
            [
                'name' => 'KwikDraw',
                'logo_path' => 'images/kwikDraw_Logo.webp',
                'description' => 'Tubos detectores colorimétricos y bombas de fuelle manuales para más de 300 tipos de gases y vapores químicos.',
                'order' => 6,
            ]
        );

        $brandUniphos = Brand::firstOrCreate(
            ['slug' => 'uniphos'],
            [
                'name' => 'Uniphos',
                'logo_path' => 'images/Uniphos_Logo.webp',
                'description' => 'Instrumentos de higiene industrial, tiras de detección y tubos dosimétricos para seguridad ocupacional.',
                'order' => 7,
            ]
        );

        $brandMacurco = Brand::firstOrCreate(
            ['slug' => 'macurco'],
            [
                'name' => 'Macurco',
                'logo_path' => 'images/Macurco_Logo.webp',
                'description' => 'Sistemas de detección de gases para cuartos mecánicos, estacionamientos y almacenes de refrigeración.',
                'order' => 8,
            ]
        );

        $brandDwyer = Brand::firstOrCreate(
            ['slug' => 'dwyer-omega'],
            [
                'name' => 'DwyerOmega',
                'logo_path' => 'images/Dwyeromega_Logo.webp',
                'description' => 'Líder en instrumentación de presión diferencial, flujo, nivel y control ambiental para procesos críticos.',
                'order' => 9,
            ]
        );

        $brandArmourx = Brand::firstOrCreate(
            ['slug' => 'armourx'],
            [
                'name' => 'Armourx',
                'logo_path' => 'images/Armourx_Logo.webp',
                'description' => 'Armazones de seguridad certificados de alto impacto diseñados específicamente para graduaciones oftálmicas industriales.',
                'order' => 10,
            ]
        );

        $brandHanwei = Brand::firstOrCreate(
            ['slug' => 'hanwei-electronics'],
            [
                'name' => 'Hanwei Electronics',
                'logo_path' => 'images/Hanwei_electronics_Logo1.webp',
                'description' => 'Tecnología de sensores de estado sólido, electroquímicos y módulos NDIR para detección de gases combustibles.',
                'order' => 11,
            ]
        );

        $brandBlv = Brand::firstOrCreate(
            ['slug' => 'blv-tech'],
            [
                'name' => 'BLV Tech',
                'logo_path' => 'images/blv_Tech_Logo.webp',
                'description' => 'Soluciones aéreas y sensores ópticos acoplados a drones para detección remota de emisiones fugitivas de metano.',
                'order' => 12,
            ]
        );

        // 4. Products
        Product::firstOrCreate(
            ['slug' => 'blackline-g7c-detector-conectado'],
            [
                'name' => 'Detector de Gas Conectado Blackline G7c',
                'sku' => 'BL-G7C-CELLULAR',
                'brand_id' => $brandBlackline->id,
                'category_id' => $catPortatiles->id,
                'short_description' => 'Detector multigás con conectividad celular 4G directa a la nube, monitoreo en tiempo real y alerta de hombre caído.',
                'full_description' => 'El Blackline G7c es la solución más avanzada del mundo para protección de trabajadores en campo. Integra sensor de gas configurable (1 a 5 gases), botón SOS manual, detección automática de caídas, comunicación de voz bidireccional tipo push-to-talk y localización GPS instantánea para rescates inmediatos.',
                'technical_specs' => [
                    'Gases soportados' => 'H2S, CO, O2, LEL, SO2, NH3, HCN, Cl2, PID (VOCs)',
                    'Conectividad' => 'Celular 4G LTE-M / 3G con cobertura global',
                    'Batería' => 'Autonomía de hasta 18 horas de uso continuo',
                    'Certificaciones' => 'Clase I División 1 Grupos A,B,C,D; ATEX Zona 0; IECEx',
                    'Resistencia' => 'IP67 a polvo y agua',
                ],
                'price' => null,
                'is_quote_only' => true,
                'image_path' => 'images/Equipos_Fijo.webp',
                'is_featured' => true,
                'is_active' => true,
            ]
        );

        Product::firstOrCreate(
            ['slug' => 'gmi-ps200-cuatrogas'],
            [
                'name' => 'Detector de Gases Portátil PS200 GMI',
                'sku' => 'GMI-PS200-4GAS',
                'brand_id' => $brandGmi->id,
                'category_id' => $catPortatiles->id,
                'short_description' => 'Detector de 4 gases robusto para espacios confinados con bomba interna de muestreo opcional.',
                'full_description' => 'El detector portátil PS200 mide simultáneamente LEL, O2, CO y H2S. Ideal para brigadas de rescate, cuadrillas de mantenimiento e inspección de alcantarillas y registros.',
                'technical_specs' => [
                    'Gases' => 'LEL (0-100%), O2 (0-25%), CO (0-1000ppm), H2S (0-100ppm)',
                    'Alarmas' => 'Audible 90dB, visual 360° por LEDs y vibratoria',
                    'Almacenamiento' => 'Datalogger integrado para más de 180 horas',
                    'Grado de protección' => 'IP67 contra inmersión y lluvia intensa',
                ],
                'price' => null,
                'is_quote_only' => true,
                'image_path' => 'images/renta_de_equipos.webp',
                'is_featured' => true,
                'is_active' => true,
            ]
        );

        Product::firstOrCreate(
            ['slug' => 'teledyne-itrans-2-transmisor-fijo'],
            [
                'name' => 'Transmisor Fijo Teledyne iTrans 2',
                'sku' => 'TD-ITRANS-2',
                'brand_id' => $brandTeledyne->id,
                'category_id' => $catFijos->id,
                'short_description' => 'Transmisor fijo inteligente de doble sensor para monitoreo continuo en cuartos de compresión y procesos.',
                'full_description' => 'Permite conectar dos sensores en una sola unidad (ej. LEL e H2S simultáneos), reduciendo costos de cableado e instalación. Salida analógica 4-20 mA con comunicación HART y Modbus RTU.',
                'technical_specs' => [
                    'Entradas' => 'Hasta 2 sensores independientes',
                    'Salidas' => '4-20 mA, 3 relevadores programables, Modbus RS-485',
                    'Gabinete' => 'Aluminio libre de cobre o Acero Inoxidable 316 NEMA 4X / IP66',
                    'Aprobaciones' => 'UL, CSA, ATEX, IECEx para Clase I Div 1',
                ],
                'price' => null,
                'is_quote_only' => true,
                'image_path' => 'images/Equipos_Fijo.png',
                'is_featured' => true,
                'is_active' => true,
            ]
        );

        Product::firstOrCreate(
            ['slug' => 'kwikdraw-tubos-h2s-02-7-vol'],
            [
                'name' => 'KwikDraw Tubos Detectores Gas H2S 0.2% (0.2 a 7% vol.)',
                'sku' => 'D7000003',
                'brand_id' => $brandKwikdraw->id,
                'category_id' => $catTubos->id,
                'short_description' => 'Tubos colorimétricos para medición de concentraciones elevadas de ácido sulfhídrico en crudo y pozos.',
                'full_description' => 'Caja con 10 tubos colorimétricos de reacción química instantánea para ácido sulfhídrico (H2S). Lectura directa en escala impresa sin necesidad de calibración electrónica previa.',
                'technical_specs' => [
                    'Rango de medición' => '0.2% a 7% vol. (2,000 a 70,000 ppm)',
                    'Número de bombeos' => '1 embolada (100 ml)',
                    'Cambio de color' => 'Azul pálido a marrón oscuro',
                    'Vida útil' => '24 meses a temperatura ambiente controlada',
                ],
                'price' => 2099.0,
                'is_quote_only' => false,
                'image_path' => 'images/kwikDraw_Logo.png',
                'is_featured' => true,
                'is_active' => true,
            ]
        );

        Product::firstOrCreate(
            ['slug' => 'kwikdraw-tubos-h2s-1-200-ppm'],
            [
                'name' => 'KwikDraw Tubos Detectores Gas H2S 1 (1 a 200 ppm)',
                'sku' => 'D5085826',
                'brand_id' => $brandKwikdraw->id,
                'category_id' => $catTubos->id,
                'short_description' => 'Tubos de alta sensibilidad para comprobación de atmósferas respirables y límites permisibles STPS.',
                'full_description' => 'Utilizados para evaluar los límites máximos permisibles de exposición en jornadas de trabajo de acuerdo a la NOM-010-STPS. Proporciona una lectura precisa en minutos.',
                'technical_specs' => [
                    'Rango de medición' => '1 a 200 ppm H2S',
                    'Tiempo de muestreo' => 'Aprox. 1.5 minutos por prueba',
                    'Presentación' => 'Caja con 10 tubos sellados al vacío',
                ],
                'price' => 1621.0,
                'is_quote_only' => false,
                'image_path' => 'images/kwikDraw_Logo.jpg',
                'is_featured' => true,
                'is_active' => true,
            ]
        );

        Product::firstOrCreate(
            ['slug' => 'armazon-seguridad-armourx-6000'],
            [
                'name' => 'Armazón de Seguridad Graduable Armourx 6000',
                'sku' => 'ARX-6000-SAFE',
                'brand_id' => $brandArmourx->id,
                'category_id' => $catLentes->id,
                'short_description' => 'Armazón envolvente de alto impacto con protectores laterales integrados y compatibilidad oftálmica.',
                'full_description' => 'Diseñado con materiales no conductores de alta durabilidad para trabajadores en líneas de manufactura, plantas químicas y talleres mecánicos. Cumple con la norma oficial mexicana NOM-017-STPS y ANSI Z87.1.',
                'technical_specs' => [
                    'Certificación' => 'ANSI Z87.1-2020 / CSA Z94.3',
                    'Material' => 'Polímero TR-90 de ultra resistencia con inserciones suaves',
                    'Tipo de micas' => 'Policarbonato o Trivex de 2.0 mm mínimo',
                    'Graduaciones' => 'Monofocal, Bifocal Flat-Top y Progresivo Digital',
                ],
                'price' => null,
                'is_quote_only' => true,
                'image_path' => 'images/Lentes_de_Seguridad.webp',
                'is_featured' => true,
                'is_active' => true,
            ]
        );

        Product::firstOrCreate(
            ['slug' => 'sensor-blv-dron-metano'],
            [
                'name' => 'Sensor Espectroscópico BLV para Detección Aérea de Metano',
                'sku' => 'BLV-METH-AIR',
                'brand_id' => $brandBlv->id,
                'category_id' => $catDrones->id,
                'short_description' => 'Payload para drones industriales orientado a la detección de fugas invisibles en gasoductos.',
                'full_description' => 'Tecnología TDLAS (Espectroscopía de Absorción Láser de Diodo Sintonizable) adaptada para montaje en drones comerciales DJI Matrice 300/350. Permite escanear kilómetros de ductos e instalaciones de gas en horas sin exponer al personal.',
                'technical_specs' => [
                    'Sensibilidad' => '5 ppm·m a distancias de hasta 50 metros',
                    'Tiempo de respuesta' => '0.1 segundos',
                    'Transmisión' => 'Video en vivo con mapa de calor de concentración de metano',
                ],
                'price' => null,
                'is_quote_only' => true,
                'image_path' => 'images/_Methane_Emissions.webp',
                'is_featured' => false,
                'is_active' => true,
            ]
        );

        // 5. Services
        Service::firstOrCreate(
            ['slug' => 'equipos-deteccion-gases'],
            [
                'name' => 'Equipos de Detección de Gases',
                'division' => 'Enjoy Safety',
                'tagline' => 'Tecnología para detectar riesgos antes de que se conviertan en incidentes',
                'description' => 'Suministramos, configuramos e integramos tecnología líder mundial para detección de gases tóxicos, combustibles, deficiencia o enriquecimiento de oxígeno en plantas de proceso, minería y refinación.',
                'icon' => 'shield-exclamation',
                'image_path' => 'images/Equipos_Fijo.webp',
                'features' => [
                    'Monitoreo personal portátil multigas (LEL, O2, H2S, CO, VOCs, NH3, SO2)',
                    'Sistemas de detección fija y controladores centralizados para cuartos de control',
                    'Detección óptica de flama multiespectral para áreas de alto riesgo',
                    'Asesoría técnica y levantamiento de campo por ingenieros certificados',
                ],
                'target_industries' => ['Petroquímica', 'Minería', 'Generación de Energía', 'Farmacéutica', 'Manufactura'],
                'order' => 1,
                'is_featured' => true,
            ]
        );

        Service::firstOrCreate(
            ['slug' => 'renta-detectores-conectados'],
            [
                'name' => 'Renta de Detectores Conectados',
                'division' => 'Enjoy Safety',
                'tagline' => 'Seguridad conectada para proyectos temporales, paros de planta y contratistas',
                'description' => 'Flota disponible para entrega inmediata en todo México. Equipos calibrados, listos para operar, con o sin telemetría en tiempo real y soporte técnico 24/7.',
                'icon' => 'signal',
                'image_path' => 'images/renta_de_equipos.webp',
                'features' => [
                    'Rentas por día, semana, mes o contratos anuales para paros de planta',
                    'Disponibilidad de tecnología Blackline G7c con GPS y monitoreo en vivo',
                    'Equipos entregados con certificado de calibración vigente bajo ISO 17025',
                    'Sustitución exprés de unidades en caso de daño o contingencia operativa',
                ],
                'target_industries' => ['Paros de Planta', 'Contratistas Industriales', 'Espacios Confinados', 'Construcción'],
                'order' => 2,
                'is_featured' => false,
            ]
        );

        Service::firstOrCreate(
            ['slug' => 'laboratorio-calibracion-iso17025'],
            [
                'name' => 'Laboratorio Acreditado ISO/IEC 17025 (ES Labs)',
                'division' => 'ES Labs',
                'tagline' => 'Confianza, trazabilidad y competencia técnica en cada calibración',
                'description' => 'Servicios especializados de calibración para detectores de gas fijos y portátiles conforme a la norma internacional ISO/IEC 17025, garantizando validez jurídica y técnica en auditorías de la STPS, SEMARNAT y Protección Civil.',
                'icon' => 'clipboard-document-check',
                'image_path' => 'images/Laboratorio_de_Calibracion.webp',
                'features' => [
                    'Acreditación bajo la norma internacional ISO/IEC 17025',
                    'Trazabilidad a patrones nacionales e internacionales (NIST / CENAM)',
                    'Calibración de detectores de todas las marcas (Blackline, Teledyne, MSA, RAE, Industrial Scientific)',
                    'Tiempos de entrega ágiles con opción de servicio exprés en 24-48 horas',
                ],
                'target_industries' => ['Auditorías STPS', 'Plantas Certificadas ISO', 'Laboratorios Químicos', 'Terminales Marítimas'],
                'order' => 3,
                'is_featured' => true,
            ]
        );

        Service::firstOrCreate(
            ['slug' => 'lentes-seguridad-prescripcion'],
            [
                'name' => 'Lentes de Seguridad con Prescripción',
                'division' => 'Enjoy Vision',
                'tagline' => 'Protección visual certificada adaptada a las necesidades ópticas de cada trabajador',
                'description' => 'Elimine el riesgo de que sus colaboradores usen sobrelentes incómodos. Diseñamos lentes de seguridad graduados con armazones certificados Armourx y micas de policarbonato de alta resistencia.',
                'icon' => 'eye',
                'image_path' => 'images/Lentes_de_Seguridad.webp',
                'features' => [
                    'Cumplimiento con ANSI Z87.1 y NOM-017-STPS',
                    'Micas de policarbonato con antirreflejante y antirrayaduras de grado industrial',
                    'Graduación exacta para astigmatismo, miopía, hipermetropía y presbicia',
                    'Garantía de confort y adaptación para jornadas laborales continuas',
                ],
                'target_industries' => ['Líneas de Ensamble', 'Almacenes Logísticos', 'Metalmecánica', 'Centros de Distribución'],
                'order' => 4,
                'is_featured' => false,
            ]
        );

        Service::firstOrCreate(
            ['slug' => 'optica-movil-in-situ'],
            [
                'name' => 'Óptica Móvil Enjoy Vision',
                'division' => 'Enjoy Vision',
                'tagline' => 'Atención visual profesional de alta tecnología, directamente en su centro de trabajo',
                'description' => 'Llevamos una unidad móvil totalmente equipada con consultorio optométrico de vanguardia hasta las puertas de su empresa, eliminando ausentismos y traslados de sus colaboradores.',
                'icon' => 'truck',
                'image_path' => 'images/Camion_Enjoy.webp',
                'features' => [
                    'Unidad móvil climatizada con equipo diagnóstico automatizado Vision-S 700',
                    'Capacidad para evaluar hasta 50 trabajadores por turno de forma ágil',
                    'Exámenes visuales realizados por optometristas con cédula profesional',
                    'Muestrario in-situ con más de 80 modelos de armazones certificados y oftálmicos',
                ],
                'target_industries' => ['Parques Industriales', 'Plantas Automotrices', 'Maquiladoras', 'Complejos Mineros'],
                'order' => 5,
                'is_featured' => true,
            ]
        );

        Service::firstOrCreate(
            ['slug' => 'campanas-salud-visual-empresas'],
            [
                'name' => 'Campañas de Salud Visual en Empresas',
                'division' => 'Enjoy Vision',
                'tagline' => 'Cuidamos la salud visual de sus colaboradores mejorando la productividad laboral',
                'description' => 'Organizamos jornadas integrales de salud visual dentro de las instalaciones de su empresa, adaptadas a los horarios y turnos de su operación con esquemas de financiamiento vía nómina o prestación empresarial.',
                'icon' => 'user-group',
                'image_path' => 'images/Campana_de_Salud.webp',
                'features' => [
                    'Diagnóstico visual preventivo y detección temprana de fatiga ocular',
                    'Esquemas de pago accesibles y deducción vía nómina para los colaboradores',
                    'Reportes estadísticos para el departamento médico y de Recursos Humanos',
                    'Seguimiento periódico y servicio posventa directo con la empresa',
                ],
                'target_industries' => ['Corporativos', 'Empresas Manufactureras', 'Call Centers', 'Empresas de Transporte'],
                'order' => 6,
                'is_featured' => false,
            ]
        );

        // 6. FAQs
        Faq::firstOrCreate(
            ['question' => '¿Qué validez tienen los certificados de calibración emitidos por ES Labs?'],
            [
                'category' => 'calibracion',
                'answer' => 'Nuestros certificados son emitidos bajo un sistema de gestión de calidad acreditado conforme a la norma internacional ISO/IEC 17025. Cuentan con trazabilidad metrológica hacia patrones nacionales (CENAM) e internacionales (NIST), lo que les otorga plena validez legal y técnica ante auditorías de la STPS (Secretaría del Trabajo), Protección Civil, SEMARNAT y casas certificadoras de ISO 9001, ISO 14001 e ISO 45001.',
                'order' => 1,
            ]
        );

        Faq::firstOrCreate(
            ['question' => '¿Cuánto tiempo tarda la calibración de un detector de gas?'],
            [
                'category' => 'calibracion',
                'answer' => 'El tiempo estándar de entrega en laboratorio es de 3 a 5 días hábiles a partir de la recepción del equipo. También contamos con servicio exprés de 24 a 48 horas para emergencias operativas o paros de planta programados.',
                'order' => 2,
            ]
        );

        Faq::firstOrCreate(
            ['question' => '¿Qué incluye el servicio de Renta de Detectores Conectados?'],
            [
                'category' => 'renta',
                'answer' => 'Cada unidad en renta se entrega con calibración vigente bajo ISO 17025, cargadores, accesorios y configurada para los gases solicitados. En el caso de los equipos Blackline G7c, incluye acceso a la plataforma en la nube Blackline Live, telemetría celular en tiempo real, monitoreo de trabajadores en campo, alertas automáticas de caídas y soporte técnico 24/7.',
                'order' => 3,
            ]
        );

        Faq::firstOrCreate(
            ['question' => '¿Cuál es la ventaja de la Óptica Móvil frente a mandar a los empleados a una óptica tradicional?'],
            [
                'category' => 'vision',
                'answer' => 'La Óptica Móvil Enjoy Vision se estaciona directamente dentro de sus instalaciones. Cada examen toma entre 10 y 15 minutos, evitando que los trabajadores pierdan medio día de labores en traslados y permisos externos. Además, garantizamos que los armazones seleccionados cumplan estrictamente con las normas industriales de su planta (ANSI Z87.1 y NOM-017-STPS).',
                'order' => 4,
            ]
        );

        Faq::firstOrCreate(
            ['question' => '¿Cómo se financian las campañas de salud visual para los empleados?'],
            [
                'category' => 'vision',
                'answer' => 'Ofrecemos esquemas sumamente flexibles: la empresa puede absorber el costo total como prestación o equipo de protección personal obligatorio, subsidiar un porcentaje, o facilitar el pago en parcialidades quincenales vía nómina sin intereses.',
                'order' => 5,
            ]
        );

        Faq::firstOrCreate(
            ['question' => '¿En qué ciudades de México tienen cobertura?'],
            [
                'category' => 'general',
                'answer' => 'Tenemos cobertura operativa a nivel nacional. Enviamos equipos y tubos detectores a cualquier parque industrial de la República Mexicana, recibimos equipos de todo el país para calibración en ES Labs y coordinamos la Óptica Móvil en las principales zonas metropolitanas e industriales del país.',
                'order' => 6,
            ]
        );

        // 7. Testimonials
        Testimonial::firstOrCreate(
            ['author_name' => 'Ing. Roberto Villarreal'],
            [
                'author_title' => 'Gerente de Seguridad, Higiene y Medio Ambiente (EHS)',
                'company' => 'Complejo Petroquímico del Golfo',
                'industry' => 'Petróleo & Gas',
                'content' => 'Implementar los detectores conectados de Enjoy Safety en nuestra última parada de planta fue un cambio radical. Tuvimos visibilidad en tiempo real de más de 80 contratistas en áreas con riesgo de H2S. Cero incidentes y cumplimiento total ante auditoría federal.',
                'rating' => 5,
                'is_featured' => true,
            ]
        );

        Testimonial::firstOrCreate(
            ['author_name' => 'Lic. Claudia Mondragón'],
            [
                'author_title' => 'Directora de Recursos Humanos y Salud Ocupacional',
                'company' => 'Grupo Automotriz del Bajío',
                'industry' => 'Automotriz',
                'content' => 'La Óptica Móvil Enjoy Vision atendió a más de 320 colaboradores en tres turnos continuos sin detener una sola línea de producción. Los lentes de seguridad graduados Armourx tienen excelente estética y durabilidad insuperable.',
                'rating' => 5,
                'is_featured' => true,
            ]
        );

        Testimonial::firstOrCreate(
            ['author_name' => 'Ing. Alejandro Fuentes'],
            [
                'author_title' => 'Jefe de Mantenimiento e Instrumentación',
                'company' => 'Compañía Minera del Norte',
                'industry' => 'Minería Subterránea',
                'content' => 'Llevamos 3 años enviando todos nuestros detectores multigas a calibración con ES Labs. La trazabilidad ISO 17025 y la rapidez de respuesta en tiempos de paro nos da total tranquilidad técnica.',
                'rating' => 5,
                'is_featured' => true,
            ]
        );

        // 8. Sample Quote Requests
        $quote1 = QuoteRequest::firstOrCreate(
            ['folio' => 'RFQ-20261104-001'],
            [
                'full_name' => 'Carlos Mendoza Díaz',
                'email' => 'carlos.mendoza@refineria-ejemplo.mx',
                'phone' => '833 219 4400',
                'company' => 'Servicios Industriales y Marítimos S.A. de C.V.',
                'role' => 'Coordinador de Seguridad Industrial',
                'service_type' => 'renta_detectores',
                'equipment_interest' => '15 detectores portátiles cuatrogás con telemetría celular',
                'details' => 'Requerimos renta por 45 días para trabajos en espacios confinados en tanque de almacenamiento durante paro de planta programado para diciembre.',
                'status' => 'en_cotizacion',
            ]
        );

        QuoteRequestNote::firstOrCreate(
            [
                'quote_request_id' => $quote1->id,
                'content' => 'Se envió propuesta técnica de Blackline G7c. Pendiente validación de fechas de entrega en Tampico.',
            ],
            [
                'user_id' => $admin->id,
                'author_name' => $admin->name,
                'interaction_type' => 'correo',
                'created_at' => now()->subDays(2),
            ]
        );

        QuoteRequestNote::firstOrCreate(
            [
                'quote_request_id' => $quote1->id,
                'content' => 'Llamada de seguimiento con Ing. Mendoza. Confirman recepción de propuesta y solicitan tiempos de entrega en Tampico.',
            ],
            [
                'user_id' => $admin->id,
                'author_name' => $admin->name,
                'interaction_type' => 'llamada',
                'created_at' => now()->subDay(),
            ]
        );

        $quote2 = QuoteRequest::firstOrCreate(
            ['folio' => 'RFQ-20261104-002'],
            [
                'full_name' => 'Mariana Estrada',
                'email' => 'm.estrada@autopartes-norte.com',
                'phone' => '844 105 8890',
                'company' => 'Manufacturas y Ensamble del Norte',
                'role' => 'Jefa de Salud Ocupacional',
                'service_type' => 'optica_movil',
                'equipment_interest' => 'Campaña con Óptica Móvil para 180 colaboradores',
                'details' => 'Buscamos evaluar a todo el personal operativo de planta y suministrar lentes de seguridad graduados con armazón certificado.',
                'status' => 'contactado',
            ]
        );

        QuoteRequestNote::firstOrCreate(
            [
                'quote_request_id' => $quote2->id,
                'content' => 'Se agendó llamada para coordinar visita de la Óptica Móvil en Ramos Arizpe.',
            ],
            [
                'user_id' => $admin->id,
                'author_name' => $admin->name,
                'interaction_type' => 'llamada',
                'created_at' => now()->subDays(3),
            ]
        );

        // 9. Site Settings
        Setting::firstOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Enjoy Safety Group',
                'site_tagline' => 'Detección de Gases, Calibración ISO 17025 y Salud Visual Industrial',
                'logo_path' => null,
                'logo_height' => 48,
                'whatsapp_number' => '+52 55 4169 7780',
                'whatsapp_message' => 'Hola Enjoy Safety, deseo cotizar equipos / calibración para mi empresa.',
                'phone_1' => '+52 55 4169 7780',
                'phone_2' => '+52 81 8350 9200',
                'contact_email' => 'contacto@enjoysafety.com.mx',
                'rfq_recipient_emails' => 'ventas@enjoysafety.com.mx, cotizaciones@enjoysafety.com.mx, direccion@enjoysafety.com.mx',
                'address' => 'Atención a nivel nacional. Laboratorio y oficinas corporativas en México.',
                'business_hours' => 'Lunes a Viernes de 8:00 a 18:00 hrs',
                'response_time_guarantee' => 'Cotización formal en < 2 horas hábiles',
                'topbar_announcement' => 'Laboratorio Acreditado ISO/IEC 17025 | Tiempos de entrega estándar y servicio exprés 24-48 hrs',
                'linkedin_url' => 'https://www.linkedin.com/company/enjoy-safety',
                'facebook_url' => 'https://www.facebook.com/enjoysafety',
            ]
        );
    }
}
