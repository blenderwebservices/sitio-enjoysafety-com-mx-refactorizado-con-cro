<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\QuoteRequest;
use App\Models\Service;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_home_page_loads_with_cro_elements(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Detección de Gases, Calibración');
        $response->assertSee('ISO 17025');
        $response->assertSee('Enjoy Vision');
        $response->assertSee('ES Labs');
        $response->assertSee('Blackline Safety');
        $response->assertSee('Teledyne Gas & Flame Detection');

        // Verify total eradication of dummy Odoo template content
        $response->assertDontSee('Ópticas XYZ');
        $response->assertDontSee('+1 555-555-5556');
        $response->assertDontSee('info@opticaejemplo.com');
        $response->assertDontSee('Laptops');
        $response->assertDontSee('Computadoras de escritorio');
    }

    public function test_catalog_page_loads_and_filters(): void
    {
        $response = $this->get('/catalogo');
        $response->assertStatus(200);
        $response->assertSee('Catálogo de Equipos');
        $response->assertSee('KwikDraw');

        // Test filtering by category
        $filterResponse = $this->get('/catalogo?category=tubos-colorimetricos');
        $filterResponse->assertStatus(200);
        $filterResponse->assertSee('KwikDraw Tubos');

        // Test searching
        $searchResponse = $this->get('/catalogo?search=Blackline');
        $searchResponse->assertStatus(200);
        $searchResponse->assertSee('Blackline G7c');
    }

    public function test_service_detail_pages_load(): void
    {
        $services = [
            'equipos-deteccion-gases',
            'renta-detectores-conectados',
            'laboratorio-calibracion-iso17025',
            'lentes-seguridad-prescripcion',
            'optica-movil-in-situ',
            'campanas-salud-visual-empresas',
        ];

        foreach ($services as $slug) {
            $response = $this->get("/soluciones/{$slug}");
            $response->assertStatus(200);
        }
    }

    public function test_contact_page_loads(): void
    {
        $response = $this->get('/contacto');

        $response->assertStatus(200);
        $response->assertSee('Contacto & Cotizaciones B2B', false);
        $response->assertSee('+52 55 4169 7780');
        $response->assertSee('contacto@enjoysafety.com.mx');
    }

    public function test_quote_request_submission_saves_to_database(): void
    {
        $postData = [
            'full_name' => 'Ing. Fernando Valdés',
            'email' => 'f.valdes@minera-mexicana.mx',
            'phone' => '81 1234 5678',
            'company' => 'Consorcio Minero de Zacatecas S.A.',
            'role' => 'Superintendente de Seguridad EHS',
            'service_type' => 'calibracion_iso17025',
            'equipment_interest' => '25 detectores multigás LEL/CO/H2S/O2',
            'details' => 'Requerimos calibración acreditada ISO 17025 con servicio exprés de 48 horas.',
        ];

        $response = $this->post('/cotizacion', $postData);

        $response->assertSessionHas('success');
        $response->assertRedirect();

        $this->assertDatabaseHas('quote_requests', [
            'email' => 'f.valdes@minera-mexicana.mx',
            'company' => 'Consorcio Minero de Zacatecas S.A.',
            'service_type' => 'calibracion_iso17025',
            'status' => 'nuevo',
        ]);

        $quote = QuoteRequest::where('email', 'f.valdes@minera-mexicana.mx')->first();
        $this->assertNotNull($quote->folio);
        $this->assertStringStartsWith('RFQ-', $quote->folio);
    }

    public function test_legal_pages_load(): void
    {
        $privacyResponse = $this->get('/aviso-de-privacidad');
        $privacyResponse->assertStatus(200);
        $privacyResponse->assertSee('Aviso de Privacidad Integral');
        $privacyResponse->assertSee('LFPDPPP');

        $termsResponse = $this->get('/terminos-y-condiciones');
        $termsResponse->assertStatus(200);
        $termsResponse->assertSee('Términos y Condiciones Comerciales B2B');
    }

    public function test_filament_admin_login_loads(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
    }

    public function test_filament_admin_panel_authenticated_access(): void
    {
        $admin = User::where('email', 'admin@enjoysafety.com.mx')->first();

        $response = $this->actingAs($admin)->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('Enjoy Safety Group');

        $quotesResponse = $this->actingAs($admin)->get('/admin/quote-requests');
        $quotesResponse->assertStatus(200);
        $quotesResponse->assertSee('Cotización');

        $productsResponse = $this->actingAs($admin)->get('/admin/products');
        $productsResponse->assertStatus(200);
        $productsResponse->assertSee('Productos');
    }

    public function test_filament_user_crud_and_front_link(): void
    {
        $admin = User::where('email', 'admin@enjoysafety.com.mx')->first();

        // Check front links on the admin panel (sidebar navigation and topbar)
        $adminResponse = $this->actingAs($admin)->get('/admin');
        $adminResponse->assertStatus(200);
        $adminResponse->assertSee('Ir al Sitio Web');
        $adminResponse->assertSee('Ver Sitio Web');

        // Check user CRUD list
        $usersResponse = $this->actingAs($admin)->get('/admin/users');
        $usersResponse->assertStatus(200);
        $usersResponse->assertSee('Usuarios');
        $usersResponse->assertSee('admin@enjoysafety.com.mx');

        // Check user CRUD create form
        $createResponse = $this->actingAs($admin)->get('/admin/users/create');
        $createResponse->assertStatus(200);
        $createResponse->assertSee('Información del Usuario');
        $createResponse->assertSee('Nombre Completo');
        $createResponse->assertSee('Correo Electrónico');
    }

    public function test_theme_selector_and_fouc_script_are_present(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        // Verify FOUC prevention script defaulting to 'light'
        $response->assertSee("localStorage.getItem('theme') || 'light'", false);
        $response->assertSee('prefers-color-scheme: dark', false);

        // Verify Theme Selector options in the markup
        $response->assertSee('Claro', false);
        $response->assertSee('Oscuro', false);
        $response->assertSee('Sistema', false);
        $response->assertSee('$store.theme.setTheme', false);
    }

    public function test_featured_services_and_progressive_disclosure(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // Verify featured badge is displayed
        $response->assertSee('★ Destacado');

        // Verify featured services are present
        $response->assertSee('Equipos de Detección de Gases');
        $response->assertSee('Laboratorio Acreditado ISO/IEC 17025 (ES Labs)');
        $response->assertSee('Óptica Móvil Enjoy Vision');

        // Verify the progressive disclosure button and remaining section elements
        $response->assertSee('Ver el resto de los servicios especializados (3 más)');
        $response->assertSee('Servicios Especializados y Terapias In-Situ');
        $response->assertSee('x-ref="infiniteSentinel"', false);
        $response->assertSee('batchSize: 3', false);
        $response->assertSee('totalRemaining: 3', false);

        // Verify remaining services exist in database with is_featured = false
        $this->assertEquals(3, Service::where('is_featured', true)->count());
        $this->assertEquals(3, Service::where('is_featured', false)->count());
    }
}
