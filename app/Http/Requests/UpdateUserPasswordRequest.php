<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPasswordRequest extends FormRequest
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
            'password_old' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'password_old' => 'current password',
            'password' => 'new password',
            'password_confirmation' => 'password confirmation',
        ];
    }
}
