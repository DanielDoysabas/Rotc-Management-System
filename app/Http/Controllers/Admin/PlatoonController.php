<?php

namespace App\Http\Controllers\Admin;
use App\Models\Otp;
use App\Models\Platoon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Platoon\PlatoonRequest;
use Yajra\DataTables\Facades\DataTables;

class PlatoonController extends Controller
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
            return DataTables::of(Platoon::all())
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>

                                <a class='dropdown-item' href='javascript:void(0)' onclick='c_edit(`#m_platoon`, `.platoon_form :input`, [`#m_platoon_title`, `Edit platoon`], [`.btn_add_platoon`, `.btn_update_platoon`], $row)'>Edit</a>

                                <a class='dropdown-item' href='javascript:void(0)' onclick='c_destroy($row->id,`admin.platoons.destroy`,`.platoon_dt`)'>Delete</a>
                            </div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('admin.platoon.index');
    }

    public function store(PlatoonRequest $request)
    {
       Platoon::create($request->validated());

       return $this->res(['success' => 'Platoon Added Successfully']);
    }

    public function update(PlatoonRequest $request, Platoon $platoon)
    {
       $platoon->update($request->validated());

       return $this->res(['success' => 'Platoon Updated Successfully']);
    }

    public function destroy(Platoon $platoon)
    {
        $platoon->delete();

       return $this->res(['success' => 'Platoon Deleted Successfully']);
    }
}