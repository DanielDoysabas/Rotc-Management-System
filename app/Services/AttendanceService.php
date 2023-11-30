<?php 

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Attendance;
use App\Http\Resources\Student\StudentResource;
use App\Models\Message;
use App\Models\Performance;

class AttendanceService  {
    
    // public function __construct(private TextService $service)
    // {
        
    // }
    
    public function handle(Student $student)
    {
        $current_time = time(); // the current time

        $formatted_current_time =  date('h:i A', $current_time); // the formatted current time

        $set_time_in = strtotime(getSettings()->time_in); // the settings time in

        $attendance = Attendance::where('student_id', $student->id)->whereDate('created_at', now())->first(); 

         if(is_null($attendance?->date_time_in))
         {

            // check if the student is late

            if($current_time > $set_time_in )
            {
                $attendance->update([
                    'date_time_in' => now(),
                    'is_late' => true,
                ]);

                // create a points deduction if the student is late.
                Performance::create([
                    'student_id' => $attendance->student_id,
                    'type' => 'demerit',
                    'points' => 1,
                    'remark' => 'late',
                    'created_at' => now(),
                ]);
            }
            else
            {
                $attendance->update([
                    'date_time_in' => now(),
                    'is_late' => false,
                ]);
            
            }

            $message = "$student->full_name, Time in at $formatted_current_time.";
                
            $this->log_attendance_activity($attendance, $message);
      
            return $this->res([
                'student' => new StudentResource($student),
                'success' => $message
            ]);
         }
         else if($attendance?->date_time_in && is_null($attendance?->date_time_out))
         {
            $attendance->update(['date_time_out' => now()]);

            $message = "$student->full_name, Time out at $formatted_current_time";

            $this->log_attendance_activity($attendance, $message);

            return $this->res([
                'student' => new StudentResource($student),
                'success' => $message
            ]);
         }
         else
         {
            return $this->error("Oops, $student->full_name has already completed his/her daily attendance.", 422);
         }
    }


    /**
     * custom attendance Logs
     *
     * @param [type] $model
     * @param [type] $message
     */
    private function log_attendance_activity($model, $message)
    {
        activity()
        ->causedBy(auth()->user())
        ->performedOn($model)
        ->withProperties(['ip' => request()->ip()])
        ->log($message);
    }

    /**
     * throw a custom response message
     *
     * @param [type] $message
     * @param integer $code
     * @return void
     */
    private function res($data)
    {
        return response()->json($data,201);
    }

    /**
     * throw a custom error message
     *
     * @param [type] $message
     * @param integer $code
     * @return void
     */
    private function error($message, $code = 401)
    {
        abort($code, $message);
    }
    
}