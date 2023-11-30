<?php

namespace Database\Seeders;

use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Run Seeders
       
        $this->call([

            /** Start Student Management */
            
                DepartmentSeeder::class,
                CourseSeeder::class,
                PlatoonSeeder::class,
                StudentSeeder::class,
                
            /** End Student Management */


            /** Start Attendance & Performance Management */
                AttendanceSeeder::class,
                PerformanceSeeder::class,
            /** End Attendance Management */


            // BarangaySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            // CategorySeeder::class,
            // PatientSeeder::class,
             SettingSeeder::class,

          
        ]);

    }
}