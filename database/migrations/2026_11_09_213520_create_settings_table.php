<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('Enjoy Safety Group');
            $table->string('site_tagline')->default('Detección de Gases, Calibración ISO 17025 y Salud Visual Industrial');
            $table->string('logo_path')->nullable();
            $table->integer('logo_height')->default(48);
            $table->string('whatsapp_number')->default('+52 55 4169 7780');
            $table->string('whatsapp_message')->default('Hola Enjoy Safety, deseo cotizar equipos / calibración para mi empresa.');
            $table->string('phone_1')->default('+52 55 4169 7780');
            $table->string('phone_2')->nullable()->default('+52 81 8350 9200');
            $table->string('contact_email')->default('contacto@enjoysafety.com.mx');
            $table->text('rfq_recipient_emails')->default('ventas@enjoysafety.com.mx, cotizaciones@enjoysafety.com.mx');
            $table->text('address')->default('Atención a nivel nacional. Laboratorio y oficinas corporativas en México.');
            $table->string('business_hours')->default('Lunes a Viernes de 8:00 a 18:00 hrs');
            $table->string('response_time_guarantee')->default('Cotización formal en < 2 horas hábiles');
            $table->string('topbar_announcement')->default('Laboratorio Acreditado ISO/IEC 17025 | Tiempos de entrega estándar y servicio exprés 24-48 hrs');
            $table->string('linkedin_url')->nullable()->default('https://www.linkedin.com/company/enjoy-safety');
            $table->string('facebook_url')->nullable()->default('https://www.facebook.com/enjoysafety');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
