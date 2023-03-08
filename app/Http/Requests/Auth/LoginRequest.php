<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => [
                'required', 'string', 'min:3'
            ],
            'password' => [
                'required', 'string', 'min:3'
            ]
        ];
    }

    /**
     * Get Custom Messages
     * 
     * @return array
     */
    public function messages(): array
    {
        return [
            'username.required' => 'Username wajib diisi',
            'username.string' => 'Username harus berupa string',
            'username.min' => 'Username harus memiliki setidaknya 3 karakter',
            'password.required' => 'Password wajib diisi',
            'password.string' => 'Password harus berupa string',
            'password.min' => 'Password harus memiliki setidaknya 3 karakter'
        ];
    }
}
