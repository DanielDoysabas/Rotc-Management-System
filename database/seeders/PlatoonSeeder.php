<?php

namespace Database\Seeders;

use App\Models\Platoon;
use Illuminate\Database\Seeder;
use App\Services\ActivityLogsService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlatoonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogsService $service)
    {
        $platoons = array(
            ['id' => 1, 'name' => 'Alpha', 'created_at' => now()],
            ['id' => 2, 'name' => 'Bravo', 'created_at' => now()],
            ['id' => 3, 'name' => 'Charlie', 'created_at' => now()],
            ['id' => 4, 'name' => 'Delta', 'created_at' => now()],
            ['id' => 5, 'name' => 'Echo', 'created_at' => now()],
            ['id' => 6, 'name' => 'Foxtrot', 'created_at' => now()],
            ['id' => 7, 'name' => 'Golf', 'created_at' => now()],
            ['id' => 8, 'name' => 'Hotel', 'created_at' => now()],
            ['id' => 9, 'name' => 'India', 'created_at' => now()],
            ['id' => 10, 'name' => 'Juliet', 'created_at' => now()],
      
        );

        Platoon::insert($platoons);

        Platoon::all()->each(fn(
            $platoon) => $service->log_activity(model:$platoon, event:'added', model_name: 'Platoon', model_property_name: $platoon->name)
        );
    }
}