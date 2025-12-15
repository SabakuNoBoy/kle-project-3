<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(LoginRequest $request)
    {
        try {
            if (!Auth::attempt($request->validated())) {
                return back()->withErrors([
                    'email' => 'Giriş bilgileri hatalı'
                ]);
            }

            $request->session()->regenerate();
            return redirect()->route('products.index');

        } catch (\Exception $e) {
            return back()->with('error', 'Giriş sırasında hata oluştu');
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::attempt($request->only('email', 'password'));

            return redirect()->route('products.index');

        } catch (\Exception $e) {
            return back()->with('error', 'Kayıt sırasında hata oluştu');
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
