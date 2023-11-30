<?php 

namespace App\Traits;

use App\Models\Student;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyStudent {

    /**
     * the model has many student
     *
     * @return HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}