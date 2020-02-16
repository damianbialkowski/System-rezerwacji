<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'firstname' => 'min:2|max:30',
            'username' => 'required|min:5|max:50',
            'email' => 'required|unique:users|max:254',
            'role' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'firstname.min' => 'Imię jest zbyt krótkie. Wymagane: :min znaków.',
            'firstname.max' => 'Imię jest zbyt długie. Maksymalnie: :max znaków.',
            'username.required' => 'Nazwa użytkownika jest wymagana.',
            'username.min' => 'Nazwa użytkownika jest zbyt krótka. Wymagane: :min znaków.',
            'username.max' => 'Nazwa użytkownika jest zbyt długa. Maksymalnie :max znaków.',
            'email.required' => 'Adres e-mail jest wymagany.',
            'email.unique' => 'Adres e-mail jest zajęty.',
            'email.max' => 'Adres e-mail jest zbyt długi. Maksymalnie :max znaków',
            'role.required' => 'Rola jest wymagana.'
        ];
    }
}
