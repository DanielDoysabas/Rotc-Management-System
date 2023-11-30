<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return match ($this->method()) {
            'POST' => [
                'course_id' => ['required'],
                'platoon_id' => ['required'],
                'student_id' => ['required'],
                'first_name' => ['required'],
                'middle_name' => ['sometimes'],
                'last_name' => ['required'],
                'sex' => ['required'],
                'birth_date' => ['required'],
                'address' => ['required'],
                'contact' => ['required', 'digits:11'],
                'email' => ['required', 'email', 'unique:users,email'],
                'is_platoon_leader' => ['required', 'boolean']
            ],
            'PUT' => [
                'course_id' => ['required'],
                'platoon_id' => ['required'],
                'student_id' => ['required'],
                'first_name' => ['required'],
                'middle_name' => ['sometimes'],
                'last_name' => ['required'],
                'sex' => ['required'],
                'birth_date' => ['required'],
                'address' => ['required'],
                'contact' => ['required', 'digits:11'],
                //'email' => ['required', 'email',],
                'email' => ['required', 'email', \Illuminate\Validation\Rule::unique('users')->ignore($this->student->user)],
                // 'is_platoon_leader' => ['required', 'boolean']
            ]
        };
    }

    public function messages()
    {
        return [
            'course_id.required' => 'The course field is required',
            'platoon_id.required' => 'The platoon field is required',
            'email.unique' => 'Email address has already been taken',
        ];
    }
}