<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
           'name' => ['required'],
           'address' => ['required'],
           'contact' => ['required', 'digits:11'],
           'email' => ['required','email', 'unique:users'],
           'password' => ['required', 'confirmed', 'min:8', 'max:12'],
           'terms_of_service' => ['accepted'],
       ];
    }
}