<?php

namespace App\Http\Controllers\PlatoonLeader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Otp;

class DashboardController extends Controller
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

        return view('platoon_leader.dashboard.index');
    }
}