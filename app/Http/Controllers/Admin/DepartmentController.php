<?php

namespace App\Http\Controllers\Admin;
use App\Models\Otp;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Department\DepartmentRequest;
use App\Models\Department;

class DepartmentController extends Controller
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
            return DataTables::of(Department::all())
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>

                                <a class='dropdown-item' href='javascript:void(0)' onclick='c_edit(`#m_department`, `.department_form :input`, [`#m_department_title`, `Edit Department`], [`.btn_add_department`, `.btn_update_department`], $row)'>Edit</a>

                                <a class='dropdown-item' href='javascript:void(0)' onclick='c_destroy($row->id,`admin.departments.destroy`,`.department_dt`)'>Delete</a>
                            </div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('admin.department.index');
    }

    public function store(DepartmentRequest $request)
    {
       Department::create($request->validated());

       return $this->res(['success' => 'Department Added Successfully']);
    }

    public function update(DepartmentRequest $request, Department $department)
    {
       $department->update($request->validated());

       return $this->res(['success' => 'Department Updated Successfully']);
    }

    public function destroy(Department $department)
    {
        $department->delete();

       return $this->res(['success' => 'Department Deleted Successfully']);
    }
}