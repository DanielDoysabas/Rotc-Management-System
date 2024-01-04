<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use 
    HasFactory;

    protected $fillable = [
        'userid',
        'otp',
        'email',
        'status',
    ];

    // ========================== Scope ======================================================

    // public function scopeByRole($query, $role)
    // {
    //     return $query->whereRelation('role', 'name', $role);
    // }
}