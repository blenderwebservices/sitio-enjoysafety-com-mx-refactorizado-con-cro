<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('division')->default('Enjoy Safety'); // 'Enjoy Safety', 'ES Labs', 'Enjoy Vision'
            $table->string('tagline');
            $table->longText('description');
            $table->string('icon')->nullable();
            $table->string('image_path')->nullable();
            $table->json('features')->nullable();
            $table->json('target_industries')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
