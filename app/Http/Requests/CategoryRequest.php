<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|min:5|max:50',
            // 'category' => 'in:'.Category::
            'content' => 'max:60',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nazwa kategorii jest wymagana',
            'name.min' => 'Nazwa kategorii jest zbyt krótka. Wymagane: :min znaków.',
            'name.max' => 'Nazwa kategorii jest zbyt długa. Maksymalnie: :max znaków.',
            'content.max' => 'Treść kategorii może zawierać :min znaków'
        ];
    }
}
