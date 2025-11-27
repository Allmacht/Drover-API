<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class CompanyMember extends Model
{
    use HasUlids;

    protected $fillable = [
        'company_id',
        'user_id',
        'role_id',
        'status',
        'permission',
        'invited_by_id',
        'joined_at',
    ];
}
