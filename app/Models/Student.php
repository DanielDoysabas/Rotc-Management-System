<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'platoon_id',
        'student_id',
        'first_name',
        'middle_name',
        'last_name',
        'sex',
        'birth_date',
        'address',
        'contact',
    ];

    // ==============================Relationship==================================================

      public function user():HasOne
      {
          return $this->hasOne(User::class);
      }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function platoon(): BelongsTo
    {
        return $this->belongsTo(Platoon::class);
    }

    public function attendances():HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function presents():HasMany
    {
        return $this->hasMany(Attendance::class)->whereNotNull('date_time_in')->whereNotNull('date_time_out');
    }

    public function absences():HasMany
    {
        return $this->hasMany(Attendance::class)->whereNull('date_time_in')->whereNull('date_time_out');
    }

    public function performances():HasMany
    {
        return $this->hasMany(Performance::class);
    }
   
    public function merits()
    {
        return $this->performances()->where('type', 'merit');
    }

    public function demerits()
    {
        return $this->performances()->where('type', 'demerit');
    }
    
  
    // ============================== Accessor & Mutator ==========================================

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}