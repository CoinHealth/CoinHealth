<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class Register extends Request
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
            'username' => 'required|unique:users,username|min:6',
            'email' => 'required|unique:users,email',
            // 'password' => ['required','confirmed','min:8','regex:/^(?=.*[A-Z].*[A-Z])(?=.*[!@#$&*])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z].*[a-z]).{8,}$/'],
            'password' => ['required','confirmed','min:8','regex:/^[0-9a-zA-Z]{8,}$/'],
        ];
    }
}
