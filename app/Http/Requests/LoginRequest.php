<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email zorunludur.',
            'email.email' => 'Geçerli bir email girin.',
            'password.required' => 'Şifre zorunludur.',
        ];
    }
}
