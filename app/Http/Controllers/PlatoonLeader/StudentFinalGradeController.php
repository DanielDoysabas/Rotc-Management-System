<?php

namespace App\Http\Controllers\PlatoonLeader;
use App\Models\Otp;
use App\Models\Role;
use App\Models\Course;
use App\Models\Platoon;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Student\StudentRequest;
use App\Http\Resources\Student\StudentResource;
use App\Http\Resources\Attendance\AttendanceResource;
use Illuminate\Support\Facades\DB;
class StudentFinalGradeController extends Controller
{
    public function index(Request $request)
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

        return view('platoon_leader.studentfinalgrade.index');
    }

    public function create(Request $data)
    {
        if(request()->ajax()) 
        {
            $stud_id = $data->query('student_id');
            $attendance = $data->query('attendance');
            $aptitude = $data->query('aptitude');
            $acad = $data->query('acad');
            $grade = (int)$attendance + (int)$aptitude + (int)$acad;
            $sdata = Student::where('student_id', $stud_id)->first();
            $student = $sdata["first_name"]." ".$sdata["middle_name"]." ".$sdata["last_name"];
            $course_id = $sdata["course_id"];
            $scourse = Course::where('id', $course_id)->first();
            $course_name = $scourse["abbreviation"];
            $remarks = "1";
            if( (int)$grade >= 75 ){
                $remarks = "0";
            }
            $a = [
                'student'=>$student,  
                'course'=>$course_name,  
                'acad'=>$acad,  
                'grade'=>$grade,  
                'remarks'=>$remarks,  
              ];

            DB::table('acadgrade')->where('student_id', $stud_id)->update($a);
            $data_all = DB::table('attendance_records')
            ->join('merits_demerits', 'merits_demerits.student_id', '=', 'attendance_records.student_id')
            ->join('acadgrade', 'acadgrade.student_id', '=', 'attendance_records.student_id')
            ->get();
            return  DataTables::of($data_all)->addIndexColumn()->make(true);
        }
    }

    public function store(Request $request)
    {
      
    }

    public function show(Request $request)
    {
        if(request()->ajax()) 
        {
            $data_all = DB::table('attendance_records')
            ->join('merits_demerits', 'merits_demerits.student_id', '=', 'attendance_records.student_id')
            ->join('acadgrade', 'acadgrade.student_id', '=', 'attendance_records.student_id')
            ->get();
            // $data_merits_demerits = DB::table('merits_demerits')->get();
            return  DataTables::of($data_all)->addIndexColumn()->make(true);
        }
    }
    
    public function edit(Request $request)
    {
        
    }

    public function update(Request $request)
    {
       
    }
    
    public function destroy(Request $request)
    {
       
    }
}