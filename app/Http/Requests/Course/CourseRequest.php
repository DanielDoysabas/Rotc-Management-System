<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
                'department_id' => ['required'],
                'name' => ['required', 'unique:courses,name'],
                'abbreviation' => ['required'],
            ],
            'PUT' => [
                'department_id' => ['required'],
                'name' => ['required', \Illuminate\Validation\Rule::unique('courses')->ignore($this->course)],
                'abbreviation' => ['required'],
            ]
        };

    }

    public function messages()
    {
        return [
            'department_id.required' => 'The department field is required.',
            'name.unique' => 'The course already exist.'
        ];
    }
}