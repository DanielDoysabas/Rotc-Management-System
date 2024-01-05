<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Otp;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\SendEmailVerification;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Support\Facades\{Auth,Hash,Mail};

class AuthController extends Controller
{
    public function __construct()
    {
        return $this->middleware('guest')->except(['logout']);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function attemptLogin(Request $request)
    {
        // redirect to desired page by specific role allowed by GATE
        $credentials = $request->only('email', 'password');
        $email = $credentials["email"];
        $token = $credentials["password"];
        if (Auth::attempt($credentials + ['is_activated' => true])) {
            $request->session()->regenerate();
            session()->put('email', $email);
            session()->put('token', $token);
            //Auth::logoutOtherDevices($request->password);
            $this->log_activity(model: auth()->user(), event:'login', model_name: 'Account', model_property_name: auth()->user()->name, conjunction:'an');
            return match (auth()->user()->role->name) {
                'admin' => to_route('admin.dashboard.index'),
                'platoon_leader' => to_route('platoon_leader.attendances.index'),
                'student' => to_route('student.attendances.index'),
            };

        } else {
            $request->session()->flush();
            return redirect('/login')->with('error', 'The Username / Password do not match');
        }
    }

    // public function attemptRegister(AuthRequest $request)
    // {
    //     $user = User::create($request->validated() + [
    //         'role_id' => \App\Models\Role::USER,
    //         'verification_token' => Str::uuid(),
    //     ]);

    //     $email_verification_route = route('auth.emailVerification', $user->verification_token);  

    //     Mail::to($user)->send(new SendEmailVerification(user: $user, email_verification_route: $email_verification_route));  // send email verification
 
    //     return back()->with(['success' => 'Registration submitted successfully. A fresh verification link has been sent to your email address. Verify first your email address to complete your registration.']);
    // }

    // public function emailVerification($token)
    // {
    //     $user = User::where('verification_token', $token)->first();

    //     if (!$user) {
    //         return to_route('auth.login')->with('error', 'Invalid Token!'); // redirect to login
    //     }

    //     $user->update(['is_activated' => true, 'email_verified_at' => now(), 'verification_token' => null]);

    //     return to_route('auth.login')->with('success', 'Account activated successfully: You can now login to our platform'); // redirect to login
    // }

   
    public function logout(Request $request)
    {
        $this->log_activity(model: auth()->user(), event:'logout', model_name: 'Account', model_property_name: auth()->user()->name, conjunction:'an');

        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();

        return to_route('auth.login');
        
    }
}