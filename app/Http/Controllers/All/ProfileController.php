<?php

namespace App\Http\Controllers\All;

use App\Models\User;
use App\Models\All\TmpImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return match(auth()->user()->role->name) {
            'admin' => view('admin.profile.index'),
            'platoon_leader' => view('platoon_leader.profile.index'),
            'student' => view('student.profile.index'),
        };
    }

    public function update(Request $request , User $user)
    {
        if($request->avatar)
        {
            $avatar = $user->getFirstMedia('avatar_image');

            $user->avatar_profile ? $avatar->delete() : '';
            
            $user->addMedia(storage_path('app/public/tmp/'. request('avatar')))->toMediaCollection('avatar_image');

            TmpImage::where('filename', $request->avatar)->delete(); // get the tmp image from the db

            return back()->with(['success' => 'Profile Updated Successfully']);
        }

        // update only the password if there is a request
        if($request->password && $request->old) 
        {
            $data = $request->validate([
                'old' => 'sometimes',
                'password' => 'sometimes|confirmed|min:6|max:15'
            ]);
            
            if(!Hash::check($request->old, $user->password))
            {
                return back()->with(['error' => 'The old password you entered is invalid']);
            }

            $user->update(['password' => Hash::make($data['password'])]); // update password [hashed]
            
            auth()->setUser($user);

            return back()->with(['success' => 'Password Updated Successfully']);
        }
        
        return back()->with(['error' => 'The avatar or password field is required']);
    }
}