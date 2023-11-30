<?php

namespace App\Models;

use App\Traits\BelongsToStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use 
    BelongsToStudent,
    HasFactory;

    protected $fillable = [
        'student_id', 
        'date_time_in', 
        'date_time_out',
        'is_late',
        // 'shift',
    ];

    // ==============================Relationship==================================================

}