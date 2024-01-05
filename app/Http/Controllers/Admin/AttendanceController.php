<?php

namespace App\Http\Controllers\Admin;
use App\Models\Otp;
use Carbon\Carbon;
use App\Models\Course;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\Attendance\AttendanceResource;

class AttendanceController extends Controller
{
    public function __invoke(Request $request)
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
        
        return view('admin.attendance.index', [
            'courses' => Course::all(),
        ]);  
    }
}