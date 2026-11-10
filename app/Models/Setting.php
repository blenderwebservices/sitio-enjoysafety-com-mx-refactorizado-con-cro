<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_tagline',
        'logo_path',
        'logo_height',
        'whatsapp_number',
        'whatsapp_message',
        'phone_1',
        'phone_2',
        'contact_email',
        'rfq_recipient_emails',
        'address',
        'business_hours',
        'response_time_guarantee',
        'topbar_announcement',
        'linkedin_url',
        'facebook_url',
    ];

    protected $casts = [
        'logo_height' => 'integer',
    ];

    public static function current(): self
    {
        $setting = self::first();

        if (! $setting) {
            $setting = self::create([
                'site_name' => 'Enjoy Safety Group',
                'site_tagline' => 'Detección de Gases, Calibración ISO 17025 y Salud Visual Industrial',
                'logo_path' => null,
                'logo_height' => 48,
                'whatsapp_number' => '+52 55 4169 7780',
                'whatsapp_message' => 'Hola Enjoy Safety, deseo cotizar equipos / calibración para mi empresa.',
                'phone_1' => '+52 55 4169 7780',
                'phone_2' => '+52 81 8350 9200',
                'contact_email' => 'contacto@enjoysafety.com.mx',
                'rfq_recipient_emails' => 'ventas@enjoysafety.com.mx, cotizaciones@enjoysafety.com.mx',
                'address' => 'Atención a nivel nacional. Laboratorio y oficinas corporativas en México.',
                'business_hours' => 'Lunes a Viernes de 8:00 a 18:00 hrs',
                'response_time_guarantee' => 'Cotización formal en < 2 horas hábiles',
                'topbar_announcement' => 'Laboratorio Acreditado ISO/IEC 17025 | Tiempos de entrega estándar y servicio exprés 24-48 hrs',
                'linkedin_url' => 'https://www.linkedin.com/company/enjoy-safety',
                'facebook_url' => 'https://www.facebook.com/enjoysafety',
            ]);
        }

        return $setting;
    }

    public function getWhatsappCleanNumberAttribute(): string
    {
        return preg_replace('/[^0-9]/', '', (string) $this->whatsapp_number);
    }

    public function getPhone1CleanAttribute(): string
    {
        return preg_replace('/[^0-9+]/', '', (string) $this->phone_1);
    }

    public function getPhone2CleanAttribute(): string
    {
        return preg_replace('/[^0-9+]/', '', (string) $this->phone_2);
    }

    public function getLogoUrlAttribute(): string
    {
        if ($this->logo_path) {
            if (Storage::disk('public')->exists($this->logo_path)) {
                return Storage::disk('public')->url($this->logo_path);
            }

            if (file_exists(public_path($this->logo_path))) {
                return asset($this->logo_path);
            }
        }

        return asset('images/logo.png');
    }

    public function getRecipientEmailsListAttribute(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', (string) $this->rfq_recipient_emails))));
    }
}
