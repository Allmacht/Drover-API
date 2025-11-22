<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OnboardingSession extends Model
{
    use HasUlids;

    protected $fillable = [
        'company_id',
        'current_step',
        'status',
        'selected_modules',
        'pricing_snapshot',
        'metadata',
        'completed_at',
        'last_interaction_at',
    ];

    protected $casts = [
        'selected_modules' => 'array',
        'pricing_snapshot' => 'array',
        'metadata' => 'array',
        'completed_at' => 'datetime',
        'last_interaction_at' => 'datetime',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
