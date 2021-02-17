<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required|string|min:5',
            'category' => 'required',
            'story' => 'required|string|min:10',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title field must be filled',
            'story.required' => 'Story field must be filled',
        ];
    }
}
