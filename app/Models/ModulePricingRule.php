<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class ModulePricingRule extends Model
{
    use HasUlids;

    protected $fillable = [
        'id',
        'module_id',
        'base_price',
        'pricing_type',
        'billing_period',
        'pricing_config',
        'has_trial',
        'trial_days',
        'trial_limits',
        'yearly_discount_percentage',
        'is_active',
        'valid_from',
        'valid_until',
    ];

    protected $casts = [
        'trial_limits' => 'array',
        'pricing_config' => 'array',
    ];
}
