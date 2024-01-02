<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Exception;
use Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;
use App\Models\Otp;

class AuthController extends Controller
{

 public function requestOtp(Request $request)
 {
    $otp = rand(1000,9999);
    Log::info("otp = ".$otp);
    $user = Otp::where('email','=',$request->email)->update(['otp' => $otp]);

    if($user){
        // send otp in the email
        $subj = 'ROTC Students Performance Record Management and Monitoring System -OTP';
        $body = $otp;
        Mail::to($request->email)->send(new sendEmail($subj,$body));
        return response(["status" => 200, "message" => "OTP sent successfully"]);
    }else{
        return response(["status" => 401, 'message' => 'Invalid']);
    }
}


    public function verifyOtp(Request $request){
    
        $user  = Otp::where([['email','=',$request->email],['otp','=',$request->otp]])->first();
        if($user){
            auth()->login($user, true);
            Otp::where('email','=',$request->email)->update(['otp' => null]);
            $accessToken = auth()->user()->createToken('authToken')->accessToken;

            return response(["status" => 200, "message" => "Success", 'user' => auth()->user(), 'access_token' => $accessToken]);
        }
        else{
            return response(["status" => 401, 'message' => 'Invalid']);
        }
    }

}