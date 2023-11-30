<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Console\Command;

class GenerateDailyAttendance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:attendance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'An artisan command that will generate a student daily attendance';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         foreach(User::byRole('student')->get() as $user) {

            Attendance::updateOrCreate(
                ['student_id' => $user->student_id, 'created_at' => now()],
                []
            );

            Attendance::updateOrCreate(
                ['student_id' => $user->student_id, 'created_at' => now()],
                []
            );
        }
    }
}