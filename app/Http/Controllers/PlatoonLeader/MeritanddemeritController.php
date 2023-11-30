<?php

namespace App\Http\Controllers\PlatoonLeader;

use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Resources\Attendance\AttendanceResource;

class MeritanddemeritController extends Controller
{
    public function __invoke(Request $request)
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

                ->with('student')
                ->whereBelongsTo(auth()->user()->student)

                ->latest()
                ->get()
            );

            return DataTables::of($attendances)->addIndexColumn()->make(true);
        }
        
        return view('platoon_leader.meritandemerit.index');  
    }
}