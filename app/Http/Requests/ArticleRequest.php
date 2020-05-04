<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Category;

class ArticleRequest extends FormRequest
{

    public function __construct()
    {

    }

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
        $lang = \App::getLocale();
        $request = request()->all();
        $slug = str_slug($request['title']);
        return [
            'title' => 'required|min:5|max:255',
            'slug' => 'unique:articles,slug->' . $lang,
            'introduction' => 'max:60',
            'content' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tytuł artykułu jest wymagany',
            'title.min' => 'Tytuł artykułu jest zbyt krótki. Wymagane: :min znaków.',
            'title.max' => 'Tytuł artykułu jest zbyt długi. Maksymalnie: :max znaków.',
            'content.required' => 'Treść artykułu jest wymagana',
            'content.min' => 'Treść artykułu musi zawierać przynajmniej :min znaków'
        ];
    }
}
