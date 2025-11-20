<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasUlids;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'short_description',
        'description',
        'category',
        'is_required',
        'is_active',
        'sort_order',
        'icon',
        'color',
        'features',
        'banner_url',
        'metadata',
    ];

    protected $casts = [
        'features' => 'array',
        'requires_modules' => 'array',
        'metadata' => 'array',
    ];
}
