<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Services\ActivityLogsService;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogsService $service)
    {
        $departments = array(

            [
                'id' => 1,
                'name' => 'College of Business, Accountancy and Public Administration',
                'abbreviation' => 'CBAPA',
                'created_at' => now()
            ],
            [
                'id' => 2,
                'name' => 'College of Engineering',
                'abbreviation' => 'COE' ,
                'created_at' => now()
            ],
            [
                'id' => 3,
                'name' => 'College of Agriculture',
                'abbreviation' => 'CA' ,
                'created_at' => now()
            ],
            [
                'id' => 4,
                'name' => 'College of Arts and Sciences',
                'abbreviation' => 'CAS' ,
                'created_at' => now()
            ],
            [
                'id' => 5,
                'name' => 'College of Education',
                'abbreviation' => 'CED' ,
                'created_at' => now()
            ],

            [
                'id' => 6,
                'name' => 'College of Computing Studies, Information and Communication Technology',
                'abbreviation' => 'CCSICT' ,
                'created_at' => now()
            ],
            [
                'id' => 7,
                'name' => 'College of Criminal Justice Education',
                'abbreviation' => 'CCJE' ,
                'created_at' => now()
            ],
            [
                'id' => 8,
                'name' => 'College of Nursing',
                'abbreviation' => 'CON' ,
                'created_at' => now()
            ],
            [
                'id' => 9,
                'name' => 'School of Veterinary Medicine',
                'abbreviation' => 'SVM' ,
                'created_at' => now()
            ],
            [
                'id' => 10,
                'name' => 'Institute of Fisheries',
                'abbreviation' => 'IOF' ,
                'created_at' => now()
            ],
           
        );

        Department::insert($departments);

        Department::all()->each(fn(
            $department) => $service->log_activity(model:$department, event:'added', model_name: 'Department', model_property_name: $department->name)
        );
    }
}