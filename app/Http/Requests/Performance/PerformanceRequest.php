<?php

namespace App\Http\Requests\Performance;

use Illuminate\Foundation\Http\FormRequest;

class PerformanceRequest extends FormRequest
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
                'type' => ['required'],
                'points' => ['required'],
                'remark' => ['required'],
            ],
            'PUT' => [
                'student_id' => ['required'],
                'type' => ['required'],
                'points' => ['required'],
                'remark' => ['required'],
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