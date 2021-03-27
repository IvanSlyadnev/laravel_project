<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlRequest extends FormRequest
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
            'url' => 'required|url',
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'url.required' => 'URl обязателен',
            'url.url' => 'Url должен быть ссылкой',
            'name.required' => 'Название ссылки обязательно'
        ];
    }
}
