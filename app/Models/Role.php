<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    public const ADMIN = 1;
    public const PLATOON_LEADER = 2;
    public const STUDENT = 3;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}