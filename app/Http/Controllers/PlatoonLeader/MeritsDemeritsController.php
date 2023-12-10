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
        
    }
        
    public function show()
    {
        if(request()->ajax())
        {
            $student_data = DB::table('merits_demerits')->get();
            return  DataTables::of($student_data)->addIndexColumn()->make(true);
        }
    }
        
}