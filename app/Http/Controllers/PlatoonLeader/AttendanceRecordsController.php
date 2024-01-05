<?php

namespace App\Http\Controllers\PlatoonLeader;
use App\Models\Otp;
use App\Models\Attendance;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\AttendanceRecords\AttendanceRecordsRequest;
use App\Http\Resources\Attendance\AttendanceRecordsResource;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Student;
use App\Models\AttendanceRecords;


class AttendanceRecordsController extends Controller
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
        
        if(request()->ajax())
        {
            if ($request->query('course')=="") {
                $student_data = DB::table('students')->leftJoin('courses', 'students.course_id', '=', 'courses.id')->get();
                return  DataTables::of($student_data)->addIndexColumn()->make(true);
            }else{
                $student_data = DB::table('students')->leftJoin('courses', 'students.course_id', '=', 'courses.id')->where('courses.id', '=', $request->query('course'))->get();
                return  DataTables::of($student_data)->addIndexColumn()->make(true);
            }
        }

        $data = DB::table('attendance_records')->get();
        $course = DB::table('courses')->get();
        $student_data = DB::table('students')->leftJoin('courses', 'students.course_id', '=', 'courses.id')->get();

        return view('platoon_leader.attendance_records.index', ['course' => $course, 'datas' => $data, 'student_data'=> $student_data]);  
    }

    public function create(Request $data)
    {
        // dd($data);
        if(request()->ajax())
        {
            $g = $data->query('data');
            $arr = []; 
            foreach ($g as $value ) {
                $query = DB::table('students')->where('student_id', '=', $value["student_id"])->get();
                if (sizeof($query)!=0) {
                    array_push($arr,$query[0]);
                }
            }
            foreach ($arr as $value) {
                $id = $value->student_id;
                $fullname= $value->first_name." ".$value->middle_name." ".$value->last_name;
                if (DB::table('attendance_records')->where('student_id', $id)->exists()) {
                }else{
                    $send = DB::table('attendance_records')->insert([
                            'student_id' => $value->student_id,
                            'student' => $fullname,
                            'day_one' => 0,
                            'day_two' => 0,
                            'day_three' => 0,
                            'day_four' => 0,
                            'day_five' => 0,
                            'day_six' => 0,
                            'day_seven' => 0,
                            'day_eight' => 0,
                            'day_nine' => 0,
                            'day_ten' => 0,
                            'day_eleven' => 0,
                            'day_twelve' => 0,
                            'day_thirtheen' => 0,
                            'day_fourtheen' => 0,
                            'day_fiftheen' => 0,
                            'total_points' => 0,
                            'average' => 0,
                            'percentage_record' => 0,
                    ]);
                }
                $sdata =  DB::table('acadgrade')->where('student_id', '=', $id)->first();
                $checkdata = $sdata["id"] ?? null;
                if($checkdata==null || $checkdata==''){
                    $sdata = Student::where('student_id', $id)->first();
                    $course_id = $sdata["course_id"];
                    $scourse = Course::where('id', $course_id)->first();
                    $course_name = $scourse["abbreviation"];
                    DB::table('acadgrade')->insert([
                        'student_id' => $id,
                        'student' => $fullname,
                        'course' => $course_name,
                        'acad' => '-',
                        'grade' => '-',
                        'remarks' => '-',
                    ]);
                }
            }
            return "true";
        }
        return "false";
        // return view('platoon_leader.attendance_records.create');
    }
        
    public function show()
    {
        if(request()->ajax())
        {
            $student_data = DB::table('attendance_records')->get();
            return  DataTables::of($student_data)->addIndexColumn()->addColumn('full_day', function ($data) {
                return $data->student_id.' - '.$data->day_one.' - '.$data->day_two.' - '.$data->day_three.' - '.$data->day_four.' - '.$data->day_five.' - '.
                $data->day_six.' - '.$data->day_seven.' - '.$data->day_eight.' - '.$data->day_nine.' - '.$data->day_ten.' - '.$data->day_eleven.' - '.
                $data->day_twelve.' - '.$data->day_thirtheen.' - '.$data->day_fourtheen.' - '.$data->day_fiftheen;
            })->make(true);
        }
        // $users = DB::table('students')->where('student_id',$id)->get();
        // return response()->json($users);
    }
        
}