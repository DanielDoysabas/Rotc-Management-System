<?php

namespace App\Http\Controllers\PlatoonLeader;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Otp;
use Yajra\DataTables\DataTables;
use App\Services\AttendanceService;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use App\Http\Requests\Attendance\AttendanceRequest;

class AttendanceMonitoringController extends Controller
{
    public function index()
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
            return DataTables::of(Activity::query()
            ->where('subject_type', 'App\Models\Attendance')
            ->whereDate('created_at', now())
            ->latest()
            ->get())
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('platoon_leader.attendance_monitoring.index');
    }

    public function store(AttendanceRequest $request, AttendanceService $service)
    {
        $student = Student::with('user.avatar', 'platoon')->where('student_id', $request->code)->first(); // get the student by QR Code || LRN

        if(!$student)
        {
            return $this->error('The student is not found.', 422);
        }

        return $service->handle(student: $student);
    }
}