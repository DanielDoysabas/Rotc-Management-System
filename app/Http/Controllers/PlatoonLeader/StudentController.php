<?php

namespace App\Http\Controllers\PlatoonLeader;
use App\Models\Otp;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\Course;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\Student\StudentResource;
use App\Http\Resources\Attendance\AttendanceResource;

class StudentController extends Controller
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
            $students = StudentResource::collection(Student::query()
                ->when($request->course, fn($query) => $query->where('course_id', $request->course))
                ->with('course', 'platoon', 'user.avatar')
                ->whereBelongsTo(auth()->user()->student->platoon)
                ->whereRelation('user', 'role_id', Role::STUDENT)
                ->get()
            );

            return DataTables::of($students) // get all teacher from the current active academic year
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $new_row = collect($row);

                    $route_show = route('platoon_leader.students.show', $new_row['id']);

                    // <a class='dropdown-item' href='$route_show'>View</a>

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                <a class='dropdown-item' href='$route_show'>View</a>
                            </div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('platoon_leader.student.index', [
            'courses' => Course::pluck('name', 'id'),
        ]);
    }

    public function show(Request $request, Student $student)
    {
        if(request()->ajax())
        {
            $attendances = AttendanceResource::collection(
                Attendance::query()
                ->when($request->query('date_time_in') && $request->query('date_time_out'), 
                    fn($query) => $query->whereBetween('created_at', [Carbon::parse($request->date_time_in)->startOfDay(), Carbon::parse($request->date_time_out)->endOfDay()]))
                ->when($request->query('date_time_in') && !$request->query('date_time_out'), 
                    fn($query) => $query->whereDate('created_at', $request->date_time_in ))
                ->when($request->query('date_time_out') && !$request->query('date_time_in'), 
                    fn($query) => $query->whereDate('date_time_out', $request->date_time_out ))
                ->with('student')
                ->whereBelongsTo($student)
                ->latest()
                ->get()
            );

            return DataTables::of($attendances)->addIndexColumn()->make(true);
        }

        return view('platoon_leader.student.show', [
            'student' => $student->load('user.avatar', 'course', 'platoon', 'performances')
        ]);
    }
}