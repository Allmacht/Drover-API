<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasUlids;

    protected $fillable = [
        'id',
        'owner_id',
        'name',
        'legal_name',
        'slug',
        'tax_id',
        'tax_id_type',
        'tax_regime',
        'business_type',
        'registration_number',
        'website',
        'billing_email',
        'billing_phone',
        'company_size',
        'status',
        'logo_url',
        'primary_color',
        'secondary_color',
        'settings',
        'metadata',
        'created_by_id',
        'updated_by_id',
    ];

    protected $casts = [
        'settings' => 'array',
        'metadata' => 'array',
    ];
}
