<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Cache;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Ajustes del Sistema';

    protected static ?string $title = 'Ajustes Generales del Sitio';

    protected static ?string $navigationLabel = 'Ajustes Generales';

    protected static ?int $navigationSort = 99;

    protected static string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $setting = Setting::current();
        $this->form->fill($setting->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Ajustes')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Identidad & Logotipo')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('site_name')
                                            ->label('Nombre de la Empresa / Sitio')
                                            ->required()
                                            ->maxLength(255),

                                        Forms\Components\TextInput::make('site_tagline')
                                            ->label('Propuesta de Valor / Eslogan Principal')
                                            ->maxLength(255),
                                    ]),

                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\FileUpload::make('logo_path')
                                            ->label('Logotipo Principal')
                                            ->image()
                                            ->directory('settings')
                                            ->visibility('public')
                                            ->imageResizeMode('contain')
                                            ->helperText('Sube el logotipo oficial en formato PNG, WEBP o SVG con fondo transparente.'),

                                        Forms\Components\TextInput::make('logo_height')
                                            ->label('Altura del Logotipo (en píxeles)')
                                            ->numeric()
                                            ->minValue(24)
                                            ->maxValue(120)
                                            ->suffix('px')
                                            ->default(48)
                                            ->required()
                                            ->helperText('Ajusta el tamaño visual del logo en la cabecera (recomendado: 40-56 px).'),
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Canales de Contacto')
                            ->icon('heroicon-o-phone')
                            ->schema([
                                Forms\Components\Section::make('WhatsApp Comercial B2B')
                                    ->description('Canal de atención rápida para paros de planta y emergencias.')
                                    ->columns(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('whatsapp_number')
                                            ->label('Número de WhatsApp')
                                            ->placeholder('+52 55 4169 7780')
                                            ->required()
                                            ->helperText('Incluye código de país (ej. +52 55 4169 7780).'),

                                        Forms\Components\TextInput::make('whatsapp_message')
                                            ->label('Mensaje Predefinido para WhatsApp')
                                            ->default('Hola Enjoy Safety, deseo cotizar equipos / calibración para mi empresa.')
                                            ->required(),
                                    ]),

                                Forms\Components\Section::make('Teléfonos de Atención Directa')
                                    ->description('Teléfonos fijos/oficinas diferentes al número de WhatsApp.')
                                    ->columns(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('phone_1')
                                            ->label('Teléfono Principal (CDMX / Matriz)')
                                            ->placeholder('+52 55 4169 7780')
                                            ->required(),

                                        Forms\Components\TextInput::make('phone_2')
                                            ->label('Teléfono Secundario (Monterrey / Planta)')
                                            ->placeholder('+52 81 8350 9200')
                                            ->nullable(),
                                    ]),

                                Forms\Components\Section::make('Correos Electrónicos')
                                    ->columns(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('contact_email')
                                            ->label('Correo Electrónico de Contacto Público')
                                            ->email()
                                            ->required()
                                            ->helperText('Visible en footer, cabecera y página de contacto.'),

                                        Forms\Components\Textarea::make('rfq_recipient_emails')
                                            ->label('Correos Destinatarios de Formularios (lista separada por comas)')
                                            ->placeholder('ventas@enjoysafety.com.mx, cotizaciones@enjoysafety.com.mx')
                                            ->rows(2)
                                            ->required()
                                            ->helperText('Direcciones que recibirán avisos de nuevas cotizaciones y contactos.'),
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Ubicación & Constantes')
                            ->icon('heroicon-o-building-office')
                            ->schema([
                                Forms\Components\Textarea::make('address')
                                    ->label('Dirección Corporativa / Laboratorio')
                                    ->rows(2)
                                    ->required(),

                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('business_hours')
                                            ->label('Horario de Atención')
                                            ->default('Lunes a Viernes de 8:00 a 18:00 hrs')
                                            ->required(),

                                        Forms\Components\TextInput::make('response_time_guarantee')
                                            ->label('Garantía de Tiempo de Respuesta')
                                            ->default('Cotización formal en < 2 horas hábiles')
                                            ->required(),
                                    ]),

                                Forms\Components\TextInput::make('topbar_announcement')
                                    ->label('Aviso Superior en Cabecera (Topbar Announcement)')
                                    ->default('Laboratorio Acreditado ISO/IEC 17025 | Tiempos de entrega estándar y servicio exprés 24-48 hrs')
                                    ->columnSpanFull(),

                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('linkedin_url')
                                            ->label('Enlace a Perfil de LinkedIn')
                                            ->url()
                                            ->placeholder('https://www.linkedin.com/company/enjoy-safety'),

                                        Forms\Components\TextInput::make('facebook_url')
                                            ->label('Enlace a Página de Facebook')
                                            ->url()
                                            ->placeholder('https://www.facebook.com/enjoysafety'),
                                    ]),
                            ]),
                    ]),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Guardar Ajustes')
                ->submit('save')
                ->color('primary')
                ->size('lg'),
        ];
    }

    public function save(): void
    {
        $state = $this->form->getState();

        $setting = Setting::first();
        if ($setting) {
            $setting->update($state);
        } else {
            Setting::create($state);
        }

        Cache::forget('site_settings');

        Notification::make()
            ->title('Ajustes del sitio guardados con éxito')
            ->success()
            ->send();
    }
}
