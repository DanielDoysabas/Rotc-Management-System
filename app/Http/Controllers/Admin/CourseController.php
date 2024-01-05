<?php

namespace App\Http\Controllers\Admin;
use App\Models\Otp;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CourseRequest;
use App\Models\Course;
use App\Models\Department;

class CourseController extends Controller
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
            return DataTables::of(Course::with('department')->get())
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>

                            <a class='dropdown-item' href='javascript:void(0)' onclick='c_edit(`#m_course`, `.course_form :input`, [`#m_course_title`, `Edit Course`], [`.btn_add_course`, `.btn_update_course`], $row, {rname:`admin.courses.create`, target:[`#d_departments`], column:`name`, r_model:[$row->department]})'>Edit</a>

                                <a class='dropdown-item' href='javascript:void(0)' onclick='c_destroy($row->id,`admin.courses.destroy`,`.course_dt`)'>Delete</a>
                            </div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('admin.course.index');
    }

    public function create()
    {
        return $this->res(['results' => Department::all()]);
    }

    public function store(CourseRequest $request)
    {
        Course::create($request->validated());

       return $this->res(['success' => 'Course Added Successfully']);
    }

   
    public function update(CourseRequest $request, Course $course)
    {
       $course->update($request->validated());

       return $this->res(['success' => 'Course Updated Successfully']);
    }

    public function destroy(Course $course)
    {
        $course->delete();

       return $this->res(['success' => 'Course Deleted Successfully']);
    }
}