<?php

namespace App\Http\Controllers\PlatoonLeader;

use App\Models\Attendance;
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
        if(request()->ajax())
        {
            $g = $data->query('data');
            $arr = []; 
            foreach ($g as $value ) {
                $query = DB::table('students')->where('student_id', '=', $value["student_id"])->get();
                // dump($query);
                // print_r($value["student_id"]);
                if (sizeof($query)!=0) {
                    array_push($arr,$query[0]);
                }
            }
            foreach ($arr as $value) {
                $id = $value->student_id;
                $fullname= $value->first_name." ".$value->middle_name." ".$value->last_name;
                if (DB::table('attendance_records')->where('student_id', $id)->exists()) {
                    dump(true);
                }else{
                    dump(false);
                    // dump($value->first_name." ".$value->middle_name." ".$value->last_name);
                    $send = DB::table('attendance_records')->insert([
                            'student_id' => $value->student_id,
                            'student' => $fullname,
                    ]);
                }
            }
        }

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