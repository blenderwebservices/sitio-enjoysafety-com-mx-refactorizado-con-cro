<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_request_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quote_request_id')->constrained('quote_requests')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('author_name')->nullable();
            $table->string('interaction_type')->default('nota'); // 'nota', 'llamada', 'correo', 'whatsapp', 'reunion', 'cotizacion'
            $table->text('content');
            $table->timestamps();
        });

        // Migrate any existing notes from quote_requests into quote_request_notes
        if (Schema::hasTable('quote_requests') && Schema::hasColumn('quote_requests', 'notes')) {
            $existingQuotes = DB::table('quote_requests')
                ->whereNotNull('notes')
                ->where('notes', '!=', '')
                ->get();

            foreach ($existingQuotes as $quote) {
                DB::table('quote_request_notes')->insert([
                    'quote_request_id' => $quote->id,
                    'user_id' => 1,
                    'author_name' => 'Director de Operaciones',
                    'interaction_type' => 'nota',
                    'content' => $quote->notes,
                    'created_at' => $quote->created_at ?? now(),
                    'updated_at' => $quote->updated_at ?? now(),
                ]);
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_request_notes');
    }
};
