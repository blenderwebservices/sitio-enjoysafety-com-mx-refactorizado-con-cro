<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $fillable = [
        'folio',
        'full_name',
        'email',
        'phone',
        'company',
        'role',
        'service_type',
        'equipment_interest',
        'details',
        'status',
        'notes',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($quote) {
            if (empty($quote->folio)) {
                $quote->folio = 'RFQ-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));
            }
        });
    }

    public function getServiceLabelAttribute(): string
    {
        return match ($this->service_type) {
            'calibracion_iso17025' => 'Calibración Acreditada ISO/IEC 17025 (ES Labs)',
            'renta_detectores' => 'Renta de Detectores de Gas Conectados',
            'equipos_fijos_portatiles' => 'Venta de Detectores Fijos / Portátiles',
            'lentes_prescripcion' => 'Lentes de Seguridad con Prescripción (Armourx)',
            'optica_movil' => 'Óptica Móvil Enjoy Vision In-Situ',
            'campana_salud_visual' => 'Campaña de Salud Visual para Empresas',
            default => ucfirst(str_replace('_', ' ', $this->service_type)),
        };
    }
}
