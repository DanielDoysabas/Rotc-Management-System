<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $fillable = [
        'name',
        'abbreviation',
    ];

    // ==============================Relationship==================================================

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function students():HasManyThrough
    {
        return $this->hasManyThrough(Student::class, Course::class);
    }
}