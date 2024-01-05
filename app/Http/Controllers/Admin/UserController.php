<?php

namespace App\Http\Controllers\Admin;
use App\Models\Otp;
use App\Models\Role;
use App\Models\User;
use App\Mail\AccountUpdate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\User\UserResource;

class UserController extends Controller
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
            $users = UserResource::collection(User::with('role', 'student')->where('role_id', '!=', Role::ADMIN)->get());

            return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('actions', function($row)
            {
                $new_row = collect($row);

                $btn = "
                <div class='dropdown'>
                    <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <i class='fas fa-ellipsis-v'></i>
                    </a>
                    <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>";

                    if ($row['is_activated'] !== 1) {
                        $btn .= "
                                <a class='dropdown-item' href='javascript:void(0)' 
                                onclick='crud_activate_deactivate($new_row[id], `admin.users.update` , `activate`, `.user_dt`, `Activate this Account`)'>Activate Account</a>";
                    } else {
                        $btn .= "
                                <a class='dropdown-item' href='javascript:void(0)' 
                                onclick='crud_activate_deactivate($new_row[id], `admin.users.update` , `deactivate`, `.user_dt`, `Deactivate this Account`)'>Deactivate Account</a>";
                    }

                    $btn.=    "<a class='dropdown-item' href='javascript:void(0)' onclick='c_destroy($new_row[id],`admin.users.destroy`,`.user_dt`)'>Delete</a>
                    </div>
                </div> ";

               return $btn;
           })
            ->rawColumns(['actions'])
            ->make(true);
        }

        return view('admin.user.index');
    }

    public function update(User $user)
    {
        if(request('option'))
        {
            // Activate || Deactivate User
            request('option') == 'activate' ? $user->update(['is_activated' => 1]) : $user->update(['is_activated' => 0]);

            // email user
           return  Mail::to($user)->send( new AccountUpdate($user));
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return $this->res(['success' => 'User Acount Deleted Successfully']);
    }
}