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


class MeritsDemeritsController extends Controller
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

        return view('platoon_leader.meritandemerit.index', ['course' => $course, 'datas' => $data, 'student_data'=> $student_data]);
    }

    public function create(Request $data)
    {
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
            if (sizeof($arr)!=0 || sizeof($arr)!=NULL) {
                foreach ($arr as $value) {
                    $id = $value->student_id;
                    $year = date("Y");
                    $fullname= $value->first_name." ".$value->middle_name." ".$value->last_name;
                    if (DB::table('merits_demerits')->where('student_id', $id)->exists()) {
                    }else{
                        // dump($value->first_name." ".$value->middle_name." ".$value->last_name);
                        $send = DB::table('merits_demerits')->insert([
                                'student_id' => $value->student_id,
                                'student' => $fullname,
                                'semester' => '0',
                                'merits' => '0',
                                'demerits' => '0',
                                'total_points' => '0',
                                'percentage' => '0',
                                'year' => $year,
                        ]);
                    }
                }
            }
        }
    }
        
    public function show()
    {
        if(request()->ajax()) 
        {
            $student_data = DB::table('merits_demerits')->get();
            return  DataTables::of($student_data)->addIndexColumn()->addColumn('full_day', function ($data) {
                return $data->student_id.'-'.$data->semester.'-'.$data->merits.'-'.$data->demerits.'-'.$data->total_points
                .'-'.$data->percentage.'-'.$data->year;
            })->make(true);
        }
    }
        
}