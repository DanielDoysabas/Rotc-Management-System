<?php

namespace App\Http\Controllers\PlatoonLeader;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\Attendance\AttendanceResource;
use App\Http\Requests\AttendanceRecords\AttendanceRecordsRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Role;
use App\Models\Student;
use App\Models\Performance;
use App\Models\AttendanceRecords;


class AttendanceRecordsController extends Controller
{
    public function index(Request $request)
    {
        if(request()->ajax())
        {
            $attendances = AttendanceResource::collection(
                Attendance::query()
                ->when(filled($request->query('date_started_at')) && filled($request->query('date_ended_at')), 
                    fn($query) => $query->whereBetween('created_at', [Carbon::parse($request->date_started_at)->startOfDay(), Carbon::parse($request->date_ended_at)->endOfDay()]))

                ->when(filled($request->query('date_started_at')) && blank($request->query('date_ended_at')), 
                    fn($query) => $query->whereDate('created_at', $request->date_started_at))

                ->when(filled($request->query('date_ended_at')) && blank($request->query('date_started_at')), 
                    fn($query) => $query->whereDate('date_ended_at', $request->date_ended_at ))

                ->when(blank($request->query('date_started_at')) && blank($request->query('date_ended_at')), 
                    fn($query) => $query->whereDate('created_at', now()))

                ->when(filled(request('course')), 
                    fn($query) => $query->whereRelation('student', 'course_id', request('course')))
                    
                ->with('student')
                ->latest()
                ->get()
            );

            return DataTables::of($attendances)->addIndexColumn()->make(true);
        }
        
        return view('platoon_leader.attendance_records.index', [
            'courses' => Course::all(),
        ]);  
    }

    public function create()
    {
        return view('platoon_leader.attendance_records.create');
    }

    public function show($id)
    {
        $users = DB::table('students')->where('student_id',$id)->get();
        return response()->json($users);
    }

    public function store(AttendanceRecordsRequest $request)
    {
        AttendanceRecords::create($request->validated());

        return to_route('platoon_leader.attendance-records.index')->with(['success' => 'Student Performance Record Added Successfully']);
    }
}