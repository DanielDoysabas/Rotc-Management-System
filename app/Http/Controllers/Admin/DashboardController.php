<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Otp;
use App\Models\Course;
use App\Models\Platoon;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function __construct()
    {
        DB::statement("SET SQL_MODE=''"); // set the strict to false
    }

    public function __invoke()
    {

        $sdata = Otp::where('userid', auth()->id())->first();
        $request_data = $sdata["status"] ?? null;
        if($request_data==null){
            return redirect('/otp');
        }else{
            if($sdata["status"]==0){
                return redirect('/otp');
            }
            // New Session Login still required OTP
            if(session()->get('is_otp')==null){
                return redirect('/otp');
            }
        }

        return view('admin.dashboard.index', [
            'activities' => Activity::latest()->take(5)->get(),
            'total_active_user' => User::notAdmin()->active()->count(),
            'total_inactive_user' => User::notAdmin()->inactive()->count(),
            'total_platoon' => Platoon::count(),
            'total_course' => Course::count(),
            'users' => User::with('student')->notAdmin()->latest()->paginate(10),
            'attendances' => Attendance::with('student')->latest()
            ->paginate(10),
            'chart_monthly_user' => $this->get_monthly_user(),
            'chart_total_student_by_platoon' => $this->get_total_student_by_platoon(),
            'chart_total_student_by_course' => $this->get_total_student_by_course(),
            'chart_total_student_by_department' => $this->get_total_student_by_department(),
        ]);
    }

    private function get_total_student_by_platoon()
    {
        $platoons = [];
        $total_student = [];

        foreach (Platoon::withCount('students')->get() as $platoon) {
            $platoons[] = $platoon->name;
            $total_student[] = $platoon->students_count;
        }

        return [$platoons, $total_student];
    }

    private function get_total_student_by_course()
    {
        $courses = [];
        $total_students = [];

        foreach (Course::withCount('students')->get() as $course) {
            $courses[] = $course->name;
            $total_students[] = $course->students_count;
        }

        return [$courses, $total_students];
    }

    private function get_total_student_by_department()
    {
        $departments = [];
        $total_student = [];

        foreach (Department::withCount('students')->get() as $department) {
            $departments[] = $department->name;
            $total_student[] = $department->students_count;
        }

        return [$departments, $total_student];
    }


    private function get_monthly_user()
    {
        $monthly_users = User::selectRaw("
        count(id) AS total_users, 
        month(created_at) as month_no, 
        DATE_FORMAT(created_at, '%M-%Y') AS new_date,
        YEAR(created_at) AS year,
        monthname(created_at) AS month"
        )
        ->notAdmin()
        ->groupBy('new_date')
        ->orderByRaw('month_no')
        ->get();

        $months = array();
        
        $total_monthly_users = array();

        foreach ($monthly_users as $month) {
            $months[] = $month->month;
        }

        foreach ($monthly_users as $total) {
            $total_monthly_users[] = $total->total_users;
        }

        return [$months, $total_monthly_users]; // sorted
    }
    
}