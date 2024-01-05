<?php

namespace App\Http\Controllers\Admin;
use App\Models\Otp;
use App\Models\Role;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Services\PatientService;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\PatientRequest;

class PatientController extends Controller
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
            return DataTables::of(Patient::all())
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $route_show = route('admin.patients.show', $row);
                    $route_edit = route('admin.patients.edit', $row);

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>

                                <a class='dropdown-item' href='$route_show'>View</a>
                                <a class='dropdown-item' href='$route_edit'>Edit</a>

                                <a class='dropdown-item' href='javascript:void(0)' onclick='c_destroy($row->id,`admin.patients.destroy`,`.patient_dt`)'>Delete</a>
                            </div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('admin.patient.index');
    }

    public function create()
    {
        return view('admin.patient.create');
    }

    public function store(PatientRequest $request, PatientService $service)
    {
        $patient = Patient::create($request->validated());

        $service->create_account(patient: $patient, email: $request->email);

        return to_route('admin.patients.index')->with(['success' => 'Patient Added Successfully']);
    }

    public function show(Patient $patient)
    {
        return view('admin.patient.show', [
            'patient' => $patient->load('user.avatar'),
        ]);
    }
    
    public function edit(Patient $patient)
    {
        return view('admin.patient.edit', [
            'patient' => $patient
        ]);
    }

    public function update(PatientRequest $request, Patient $patient)
    {
        $patient->update($request->validated());

        $patient->user()->updateOrCreate(
            ['role_id' => Role::USER],
            ['email' => $request->email],
        );

       return to_route('admin.patients.index')->with(['success' => 'Patient Updated Successfully']);
    }
    public function destroy(Patient $patient)
    {
        $patient->delete();

       return $this->res(['success' => 'Patient Deleted Successfully']);
    }
}
