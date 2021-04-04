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
            'name'         => 'required|string|min:3|max:64',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|min:6|max:128|dumbpwd|confirmed',
            // 'signup-terms' => 'required|accepted'
            //   'password' => 'required|min:6|dumbpwd|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'signup-terms' => 'The Terms and Condtions must be accepted.',
        ];
    }
}
