<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'division',
        'tagline',
        'description',
        'icon',
        'image_path',
        'features',
        'target_industries',
        'order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'target_industries' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->name);
            }
        });
    }
}

