<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Services\ActivityLogsService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogsService $service)
    {
        $courses = [
            [
                'id' => 1,
                'department_id' => 1,
                'name' => 'Doctor of Veterinary Medicine',
                'abbreviation' => 'DVM',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'department_id' => 1,
                'name' => 'Bachelor of Science in Animal Husbandry',
                'abbreviation' => 'BSAH',
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'department_id' => 1,
                'name' => 'Bachelor of Science in Agriculture',
                'abbreviation' => 'BSA',
                'created_at' => now(),
            ],
            [
                'id' => 4,
                'department_id' => 1,
                'name' => 'Bachelor of Science in Agribusiness',
                'abbreviation' => 'BSAB',
                'created_at' => now(),
            ],
            [
                'id' => 5,
                'department_id' => 1,
                'name' => 'Bachelor of Science in Forestry',
                'abbreviation' => 'BSF',
                'created_at' => now(),
            ],
            [
                'id' => 6,
                'department_id' => 1,
                'name' => 'Bachelor of Science in Environmental Science',
                'abbreviation' => 'BSES',
                'created_at' => now(),
            ],
            [
                'id' => 7,
                'department_id' => 1,
                'name' => 'Bachelor of Science in Biology',
                'abbreviation' => 'BSB',
                'created_at' => now(),
            ],
            [
                'id' => 8,
                'department_id' => 2,
                'name' => 'Bachelor of Science in Mathematics',
                'abbreviation' => 'BSM',
                'created_at' => now(),
            ],
            [
                'id' => 9,
                'department_id' => 2,
                'name' => 'Bachelor of Science in Psychology',
                'abbreviation' => 'BSP',
                'created_at' => now(),
            ],
            [
                'id' => 10,
                'department_id' => 2,
                'name' => 'Bachelor of Arts in Communication',
                'abbreviation' => 'BA Communication',
                'created_at' => now(),
            ],
            [
                'id' => 11,
                'department_id' => 2,
                'name' => 'Bachelor of Arts in English Language Studies',
                'abbreviation' => 'BA English',
                'created_at' => now(),
            ],
            [
                'id' => 12,
                'department_id' => 3,
                'name' => 'B.S. in Business Administration',
                'abbreviation' => 'BSBAdmin',
                'created_at' => now(),
            ],
            [
                'id' => 13,
                'department_id' => 3,
                'name' => 'Bachelor in Public Administration',
                'abbreviation' => 'BPA',
                'created_at' => now(),
            ],
            [
                'id' => 14,
                'department_id' => 3,
                'name' => 'B.S. in Management Accounting',
                'abbreviation' => 'BSMA',
                'created_at' => now(),
            ],
            [
                'id' => 15,
                'department_id' => 3,
                'name' => 'B.S. in Entrepreneurship',
                'abbreviation' => 'BSE',
                'created_at' => now(),
            ],
            [
                'id' => 16,
                'department_id' => 3,
                'name' => 'B.S. in Accountancy',
                'abbreviation' => 'BSAc',
                'created_at' => now(),
            ],
            [
                'id' => 17,
                'department_id' => 3,
                'name' => 'B.S. in Hospitality Management',
                'abbreviation' => 'BSHM',
                'created_at' => now(),
            ],
            [
                'id' => 18,
                'department_id' => 3,
                'name' => 'B.S. in Tourism Management',
                'abbreviation' => 'BSTM',
                'created_at' => now(),
            ],
            [
                'id' => 19,
                'department_id' => 4,
                'name' => 'Bachelor of Science in Agricultural and Biosystems Engineering',
                'abbreviation' => 'BSAE',
                'created_at' => now(),
            ],
            [
                'id' => 20,
                'department_id' => 4,
                'name' => 'Bachelor of Science in Civil Engineering',
                'abbreviation' => 'BSCE',
                'created_at' => now(),
            ],
            [
                'id' => 21,
                'department_id' => 5,
                'name' => 'Bachelor of Elementary Education',
                'abbreviation' => 'BEEd',
                'created_at' => now(),
            ],
            [
                'id' => 22,
                'department_id' => 5,
                'name' => 'Bachelor of Secondary Education',
                'abbreviation' => 'BSEd',
                'created_at' => now(),
            ],
            [
                'id' => 23,
                'department_id' => 5,
                'name' => 'Bachelor of Physical Education',
                'abbreviation' => 'BPE',
                'created_at' => now(),
            ],
            [
                'id' => 24,
                'department_id' => 5,
                'name' => 'Bachelor of Technology and Livelihood Education',
                'abbreviation' => 'BTLE',
                'created_at' => now(),
            ],
            [
                'id' => 25,
                'department_id' => 6,
                'name' => 'Bachelor of Science in Information Technology',
                'abbreviation' => 'BSIT',
                'created_at' => now(),
            ],
            [
                'id' => 26,
                'department_id' => 6,
                'name' => 'Bachelor of Science in Information Systems',
                'abbreviation' => 'BSIS',
                'created_at' => now(),
            ],
            [
                'id' => 27,
                'department_id' => 6,
                'name' => 'Bachelor of Science in Computer Science',
                'abbreviation' => 'BSCS',
                'created_at' => now(),
            ],
            [
                'id' => 28,
                'department_id' => 6,
                'name' => 'Bachelor of Library and Information Science',
                'abbreviation' => 'BLIS',
                'created_at' => now(),
            ],
            [
                'id' => 29,
                'department_id' => 7,
                'name' => 'B.S. in Fisheries and Aquatic Sciences',
                'abbreviation' => 'BSFAS',
                'created_at' => now(),
            ],
            [
                'id' => 30,
                'department_id' => 8,
                'name' => 'B.S. in Criminology',
                'abbreviation' => 'BSCrim',
                'created_at' => now(),
            ],
            [
                'id' => 31,
                'department_id' => 9,
                'name' => 'Bachelor of Science in Law Enforcement Administration',
                'abbreviation' => 'BSLEA',
                'created_at' => now(),
            ],
            [
                'id' => 32,
                'department_id' => 10,
                'name' => 'Bachelor of Science in Nursing',
                'abbreviation' => 'BSN',
                'created_at' => now(),
            ],
            // [
            //     'id' => 33,
            //     'department_id' => 11,
            //     'name' => '3 Year Diploma in Agricultural Technology',
            //     'abbreviation' => 'Diploma Agri Tech',
            //     'created_at' => now(),
            // ],
        ];



        Course::insert($courses);

        Course::all()->each(fn(
            $course) => $service->log_activity(model:$course, event:'added', model_name: 'Course', model_property_name: $course->name)
        );
    }
}