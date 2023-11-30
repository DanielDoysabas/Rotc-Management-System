<?php 

namespace App\Services;

use App\Models\Patient;
use App\Models\Role;
use Illuminate\Support\Str;
use App\Mail\AccountCreated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PatientService {

    /**
     * create a login account for the newly created patient
     *
     * @param Patient $patient
     * @param [type] $email
     * @return void
     */
    public function create_account(Patient $patient, $email)
    {
       $password = Str::random(10); // the random password;

       $user = $patient->user()->create(['email' => $email, 'password' => Hash::make($password), 'role_id' => Role::USER, 'is_activated' => true ]);   // create an account 

       return  Mail::to($user)->send( new AccountCreated($user, $password));        // notify patient that the account has successfully created
    }

}