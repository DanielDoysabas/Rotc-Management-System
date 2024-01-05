<?php

namespace App\Http\Controllers\PlatoonLeader;
use App\Models\Otp;
use App\Models\Course;
use App\Models\Performance;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Performance\PerformanceRequest;
use App\Http\Resources\Performance\PerformanceResource;
use App\Models\Role;
use App\Models\Student;

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
                ->when($request->course, fn($query) => $query->whereRelation('student', 'course_id', $request->course))
                ->with(['student' => fn($query) => $query->with('course', 'platoon', 'user.avatar')])
                ->whereRelation('student', 'platoon_id', auth()->user()->student->platoon_id)
                ->get()
            );

            return DataTables::of($students) // get all teacher from the current active academic year
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $new_row = collect($row);

                    $route_show = route('platoon_leader.performances.show', $new_row['id']);
                    $route_edit = route('platoon_leader.performances.edit', $new_row['id']);

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                <a class='dropdown-item' href='$route_show'>View</a>
                                <a class='dropdown-item' href='$route_edit'>Edit</a>

                                <a class='dropdown-item' href='javascript:void(0)' onclick='c_destroy($new_row[id],`platoon_leader.performances.destroy`,`.performance_dt`)'>Delete</a>
                            </div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('platoon_leader.performance.index', [
            'courses' => Course::pluck('name', 'id'),
        ]);
    }

    public function create()
    {
        return view('platoon_leader.performance.create', [
            'students' => Student::whereRelation('user', 'role_id', Role::STUDENT)->whereBelongsTo(auth()->user()->student->platoon)->get(),
        ]);
    }

    public function store(PerformanceRequest $request)
    {
        Performance::create($request->validated());

        return to_route('platoon_leader.performances.index')->with(['success' => 'Student Performance Record Added Successfully']);
    }

    public function show(Performance $performance)
    {
        return view('platoon_leader.performance.show', [
            'performance' => $performance->load('student'),
            'performances' => Performance::whereBelongsTo($performance->student)->where('id', '!=', $performance->id)->paginate(10),
        ]);
    }

    public function edit(Performance $performance)
    {
        return view('platoon_leader.performance.edit', [
            'performance' => $performance,
            'students' => Student::whereRelation('user', 'role_id', Role::STUDENT)->whereBelongsTo(auth()->user()->student->platoon)->get(),
        ]);
    }

    public function update(PerformanceRequest $request, Performance $performance)
    {
        $performance->update($request->validated());

        return to_route('platoon_leader.performances.index')->with(['success' => 'Student Performance Record Updated Successfully']);
    }

    public function destroy(Performance $performance)
    {
        $performance->delete();

       return $this->res(['success' => 'Student Performance Record Deleted Successfully']);
    }
}