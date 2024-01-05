<?php

namespace App\Http\Controllers\Student;

use App\Models\Performance;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Resources\Performance\PerformanceResource;

class PerformanceController extends Controller
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
            $students = PerformanceResource::collection(Performance::query()
                ->with(['student' => fn($query) => $query->with('course', 'platoon', 'user.avatar')])
                ->whereBelongsTo(auth()->user()->student)
                ->get()
            );

            return DataTables::of($students) // get all teacher from the current active academic year
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $new_row = collect($row);

                    $route_show = route('student.performances.show', $new_row['id']);

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

        return view('student.performance.index');
    }

    public function show(Performance $performance)
    {
        return view('student.performance.show', [
            'performance' => $performance->load('student'),
            'performances' => Performance::whereBelongsTo($performance->student)->where('id', '!=', $performance->id)->paginate(10),
        ]);
    }

}