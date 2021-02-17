<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        return [
            'name' => 'required|string|between:5,40',
            'email' => 'required|email|string',
            'phone' => 'required|string|min:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field must be filled',
            'name.between' => 'Name length must be between 5 to 40 characters',
            'email.required' => 'Email field must be filled',
            'phone.required' => 'Phone field must be filled',
        ];
    }
}
