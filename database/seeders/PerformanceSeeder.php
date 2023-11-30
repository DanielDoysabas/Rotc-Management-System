<?php

namespace Database\Seeders;

use App\Models\Performance;
use App\Services\ActivityLogsService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerformanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogsService $service)
    {
        $student_performances = array(
            [
                'id' => 1,
                'student_id' => 2,
                'type' => 'merit',
                'points' => 2,
                'remark' => 'passed activity #1',
                'created_at' => now()->subDay(),
            ],
            [
                'id' => 2,
                'student_id' => 2,
                'type' => 'demerit',
                'points' => 1,
                'remark' => 'late',
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'student_id' => 3,
                'type' => 'merit',
                'points' => 1,
                'remark' => 'passed activity #2',
                'created_at' => now(),
            ],
        );


        Performance::insert($student_performances);
    }
}