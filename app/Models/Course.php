<?php

namespace App\Models;

use App\Traits\HasManyStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use 
    HasManyStudent,
    HasFactory;

    protected $fillable = [
        'department_id',
        'name',
        'abbreviation'
    ];

    // ==============================Relationship==================================================

    public function department():BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}