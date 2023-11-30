<?php 

namespace App\Traits;

use App\Models\Student;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToStudent {

    /**
     * the model belongs to student
     *
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}