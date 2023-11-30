<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'sex',
        'birth_date',
        'address',
        'contact',
    ];

      // ==============================Relationship==================================================

    //   public function user():HasOne
    //   {
    //       return $this->hasOne(User::class);
    //   }
  
      // ============================== Accessor & Mutator ==========================================
  
      public function getFullNameAttribute()
      {
          return $this->first_name . ' ' . $this->last_name;
      }
}