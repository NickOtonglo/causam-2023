<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveArticleRequest extends FormRequest
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
            'title' => 'required',
            'preview' => 'required',
            // 'content' => 'required',
            'thumbnail' => 'required'
        ];
    }

    public function attributes() {
        return [
            'preview' => 'content',
        ];
    }
}
