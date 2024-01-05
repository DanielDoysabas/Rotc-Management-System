<?php

namespace App\Http\Controllers\Admin;
use App\Models\Otp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\Facades\DataTables;

class ActivityLogController extends Controller
{
    public function __invoke()
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
            return DataTables::of(Activity::latest()->get())
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('admin.activitylog.index');  
    }
}