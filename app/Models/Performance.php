<?php

namespace App\Models;

use App\Traits\BelongsToStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use 
    BelongsToStudent,
    HasFactory;

    protected $fillable = [
        'student_id',
        'type',
        'points',
        'remark'
    ];
}