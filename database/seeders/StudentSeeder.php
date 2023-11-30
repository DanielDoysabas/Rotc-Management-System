<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use App\Services\ActivityLogsService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogsService $service)
    {
        $students = array(
            [
                'id' => 1, // the platoon leader
                'course_id' => 2,
                'platoon_id' => 1,
                'student_id' => '1234567',
                'first_name' => 'Platoon',
                'middle_name' => 'D',
                'last_name' => 'Leader',
                'sex' => 'male',
                'birth_date' => '1998-01-01',
                'address' => 'Sample Address',
                'contact' => '09659312003',
                'created_at' => now()->subMonth()
            ],
            [
                'id' => 2,
                'course_id' => 2,
                'platoon_id' => 1,
                'student_id' => '123456',
                // 'student_id' => rand(123456,999999),
                'first_name' => 'Dev',
                'middle_name' => 'D',
                'last_name' => 'Dev',
                'sex' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'contact' => '09659312003',
                'created_at' => now()->subMonth()
            ],
            [
                'id' => 3,
                'course_id' => 2,
                'platoon_id' => 1,
                'student_id' => rand(123456,999999),
                'first_name' => 'Aishling Chrystal',
                'middle_name' => 'D',
                'last_name' => 'Dalapnas',
                'sex' => 'female',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'contact' => '09060320492',
                'created_at' => now()->subMonth()
            ],
            [
                'id' => 4,
                'course_id' => 3,
                'platoon_id' => 2,
                'student_id' => rand(123456,999999),
                'first_name' => 'John',
                'middle_name' => 'D',
                'last_name' => 'Doe',
                'sex' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'contact' => '09534419130',
                'created_at' => now()->subMonth()
            ],

        );

        Student::insert($students);

        Student::all()->each(fn(
            $student) => $service->log_activity(model:$student, event:'added', model_name: 'Student', model_property_name: $student->full_name)
        );
    }
}