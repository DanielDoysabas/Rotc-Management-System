<?php

namespace App\Http\Requests\Department;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
                'name' => ['required', 'unique:departments,name'],
                'abbreviation' => ['required'],
            ],
            'PUT' => [
                'name' => ['required', \Illuminate\Validation\Rule::unique('departments')->ignore($this->department)],
                'abbreviation' => ['required'],
            ]
        };

    }

    public function messages()
    {
        return [
            'name.unique' => 'The department already exist.'
        ];
    }
}