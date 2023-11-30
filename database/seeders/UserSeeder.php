<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Services\ActivityLogsService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogsService $service)
    {
        $users = array(
            // generate sample admin
             [
                'id' => 1,
                'student_id' => null,
                'name' => 'Administrator',
                'email' => 'admin@gmail.com', 
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::ADMIN,
                'created_at' => now()
             ],
 
           // generate sample platoon leader
             [
                'id' => 2,
                'student_id' => 1,
                'name' => null,
                'email' => 'platoon@gmail.com', 
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::PLATOON_LEADER,
                'created_at' => now()
             ],

             // generate sample student
             [
                'id' => 3,
                'student_id' => 2,
                'name' => null,
                'email' => 'student@gmail.com', 
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::STUDENT,
                'created_at' => now()
             ],
             [
                'id' => 4,
                'student_id' => 3,
                'name' => null,
                'email' => 'aishlingchrystal@isu.edu.ph', 
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::STUDENT,
                'created_at' => now()
             ],
             [
                'id' => 5,
                'student_id' => 4
                ,
                'name' => null,
                'email' => 'johndoe@gmail.com', 
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::STUDENT,
                'created_at' => now()
             ],
          );
 
          User::insert($users);

          User::all()->each(function($user) use($service){
            $user
            ->addMedia(public_path("/tmp_files/avatars/$user->id.png"))
            ->preservingOriginal()
            ->toMediaCollection('avatar_image');

            $service->log_activity(model: $user, event:'added', model_name: 'User', model_property_name: $user->student->full_name ?? 'Administrator');
        });
    }
}