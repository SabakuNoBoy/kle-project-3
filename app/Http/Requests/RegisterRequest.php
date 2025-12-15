<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'İsim zorunludur.',
            'email.required' => 'Email zorunludur.',
            'email.email' => 'Geçerli bir email girin.',
            'email.unique' => 'Bu email zaten kayıtlı.',
            'password.required' => 'Şifre zorunludur.',
            'password.confirmed' => 'Şifreler eşleşmiyor.',
        ];
    }
}
