<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Services\ActivityLogsService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogsService $service)
    {
        $attendances = array(
            [
                'id' => 1,
                'student_id' => 2,
                'date_time_in' => now()->subDays(),
                'date_time_out' => now()->subDays()->addHours(7),
                'is_late' => false,
                'created_at' => now()->subDays(),
            ],
            [
                'id' => 2,
                'student_id' => 3,
                'date_time_in' => now()->subDays(),
                'date_time_out' => now()->subDays()->addHours(7),
                'is_late' => false,
                'created_at' => now()->subDays(),
            ],
            [
                'id' => 3,
                'student_id' => 4,
                'date_time_in' => now()->subDays(),
                
                'date_time_out' => now()->subDays()->addHours(7),
                'is_late' => false,
                'created_at' => now()->subDays(),
            ],
            // [
            //     'id' => 1,
            //     'student_id' => 1,
            //     'date_time_in' => now()->subDays(2),
            //     'date_time_out' => now()->subDays(2)->addHours(7),
            //     'created_at' => now()->subDays(2),
            // ],
        );

        Attendance::insert($attendances);

        // Attendance::all()->each(fn(
        //     $attendance) => $service->log_activity(model:$attendance, event:'added', model_name: 'Attendance', model_property_name: $attendance->name)
        // );
    }
}