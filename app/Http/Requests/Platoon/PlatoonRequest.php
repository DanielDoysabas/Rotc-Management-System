<?php

namespace App\Http\Requests\Platoon;

use Illuminate\Foundation\Http\FormRequest;

class PlatoonRequest extends FormRequest
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
        return match ($this->method()) {
            'POST' => [
                'name' => ['required', 'unique:platoons,name'],
            ],
            'PUT' => [
                'name' => ['required', \Illuminate\Validation\Rule::unique('platoons')->ignore($this->platoon)],
            ]
        };

    }

    public function messages()
    {
        return [
            'name.unique' => 'The platoon already exist.'
        ];
    }
}