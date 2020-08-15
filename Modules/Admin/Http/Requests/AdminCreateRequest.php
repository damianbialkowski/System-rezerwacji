<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255',
            'last_name' => 'min:2|max:255',
            'login' => 'required|min:2|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $this->email,
            'role_id' => 'required',
            'password' => 'required|confirmed|min:6',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'email.unique' => 'E-mail already exists.',
        ];
    }
}
