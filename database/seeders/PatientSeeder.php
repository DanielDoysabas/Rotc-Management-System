<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;
use App\Services\ActivityLogsService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogsService $service)
    {
        $patients = array(
            [
                'id' => 1,
                'first_name' => 'Dev',
                'middle_name' => 'D',
                'last_name' => 'Ace',
                'sex' => 'male',
                'birth_date' => '1998-01-01',
                'address' => 'Sample Address',
                'contact' => '09659312003',
                'created_at' => now()->subMonth()
            ],

            [
                'id' => 2,
                'first_name' => 'Patient',
                'middle_name' => 'M',
                'last_name' => 'Two',
                'sex' => 'female',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'contact' => '09266855151',
                'created_at' => now()->subMonth()
            ],

            [
                'id' => 3,
                'first_name' => 'Patient',
                'middle_name' => 'D',
                'last_name' => 'Three',
                'sex' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'contact' => '09666856119',
                'created_at' => now()->subMonth()
            ],

        );

        Patient::insert($patients);

        Patient::all()->each(fn(
            $patient) => $service->log_activity(model:$patient, event:'added', model_name: 'Patient', model_property_name: $patient->full_name)
        );
    }
}