<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->unique();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('company');
            $table->string('role')->nullable();
            $table->string('service_type'); // 'calibracion_iso17025', 'renta_detectores', 'equipos_fijos_portatiles', 'lentes_prescripcion', 'optica_movil', 'campana_salud_visual'
            $table->string('equipment_interest')->nullable();
            $table->text('details')->nullable();
            $table->string('status')->default('nuevo'); // 'nuevo', 'contactado', 'en_cotizacion', 'ganado', 'archivado'
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};
