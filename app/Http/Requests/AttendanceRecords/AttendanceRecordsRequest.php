<?php

namespace App\Http\Requests\AttendanceRecords;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRecordsRequest extends FormRequest
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
                'student_id' => ['required'],
                'total_points' => ['required'],
                'average' => ['required'],
                'percentage' => ['required'],
            ],
            'PUT' => [
                'student_id' => ['required'],
                'total_points' => ['required'],
                'average' => ['required'],
                'percentage' => ['required'],
            ]
        };
    }

    public function messages()
    {
        return [
            'student_id.required' => 'The student field is required',
        ];
    }
}