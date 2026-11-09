<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuoteRequestNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote_request_id',
        'user_id',
        'author_name',
        'interaction_type',
        'content',
        'created_at',
    ];

    public function quoteRequest(): BelongsTo
    {
        return $this->belongsTo(QuoteRequest::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getInteractionTypeLabelAttribute(): string
    {
        return match ($this->interaction_type) {
            'llamada' => 'Llamada Telefónica',
            'correo' => 'Correo Electrónico',
            'whatsapp' => 'WhatsApp Comercial',
            'reunion' => 'Reunión / Visita Técnica',
            'cotizacion' => 'Envío de Cotización',
            default => 'Nota Interna',
        };
    }
}
