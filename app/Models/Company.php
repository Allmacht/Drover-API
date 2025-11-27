<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'company_members',
            'company_id',
            'user_id'
        )
            ->withPivot(['role_id', 'status', 'permission', 'invited_by_id', 'joined_at'])
            ->withTimestamps()
            ->wherePivot('status', 'active');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function isMember(string $userId): bool
    {
        return $this->members()->where('user_id', $userId)->exists();
    }
}
