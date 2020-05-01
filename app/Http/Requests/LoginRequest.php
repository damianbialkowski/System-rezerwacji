<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the users is authorized to make this request.
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
            'email' => 'required|max:254',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Adres e-mail jest wymagany.',
            'email.max' => 'Adres e-mail jest zbyt długi',
            'password.required' => 'Hasło jest wymagane.',
        ];
    }
}
