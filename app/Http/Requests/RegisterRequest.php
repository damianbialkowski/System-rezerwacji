<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|min:4|max:50',
            'email' => 'required|unique:users|max:254',
            'password' => 'min:4|required_with:password_repeat|same:password_confirmation',
            'password_confirmation' => 'min:4',
            'accepted_rules' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Nazwa użytkownika jest wymagana.',
            'username.min' => 'Nazwa użytkownika jest za krótka. Wymagane :min znaków',
            'username.max' => 'Nazwa użytkownika jest za długa. Wymagane :max znaków',
            'email.required' => 'Adres e-mail jest wymagany.',
            'email.unique' => 'Ten adres e-mail już istnieje.',
            'email.max' => 'Adres e-mail jest za długi. Wymagane :max znaków.',
            'password.min' => 'Hasło jest zbyt krótkie. Wymagane :min znaków.',
            'password.same' => 'Hasła nie są takie same.',
            'password_confirmation.min' => 'Hasło jest zbyt krótkie. Wymagane :min znaków.',
            'accepted_rules.required' => 'Nie zapoznałeś/aś się z regulaminem!'
        ];
    }
}
