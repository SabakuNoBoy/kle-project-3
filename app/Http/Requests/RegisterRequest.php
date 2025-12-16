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
            'name'                  => 'required|string|min:3|max:50',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'                  => 'İsim zorunludur.',
            'name.min'                       => 'İsim en az 3 karakter olmalıdır.',

            'email.required'                 => 'Email zorunludur.',
            'email.email'                    => 'Geçerli bir email giriniz.',
            'email.unique'                   => 'Bu email zaten kayıtlı.',

            'password.required'              => 'Şifre zorunludur.',
            'password.min'                   => 'Şifre en az 6 karakter olmalıdır.',
            'password.confirmed'             => 'Şifreler eşleşmiyor.',

            'password_confirmation.required' => 'Şifre tekrarı zorunludur.',
        ];
    }
}
