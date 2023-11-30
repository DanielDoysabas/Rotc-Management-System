<?php

namespace App\Models;

use App\Traits\HasManyStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platoon extends Model
{
    use
    HasManyStudent,
    HasFactory;

    protected $fillable = ['name'];

}