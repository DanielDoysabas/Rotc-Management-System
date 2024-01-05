<?php

namespace App\Http\Controllers\Admin;
use App\Models\Otp;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
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
        return view('admin.setting.index');
    }

    public function update(Request $request, Setting $setting)
    {
        $setting->update($request->validate(['color_theme' => 'required']));

        return back()->with(['success' => 'Settings Updated Successfully']);
    }
}