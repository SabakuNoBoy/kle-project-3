<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (session()->has('url.intended')) {
            session()->flash('error', 'Verileri görmek için giriş yapmalısınız');
        }

        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return back()
                ->withErrors(['auth' => 'Email veya şifre hatalı.'])
                ->withInput();
        }

        $request->session()->regenerate();

        return redirect()
            ->intended(route('dashboard'))
            ->with('success', 'Hoşgeldiniz 👋');
    }

    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return redirect()
                ->route('dashboard')
                ->with('success', 'Kayıt başarılı, hoşgeldiniz 👋');

        } catch (Exception $e) {
            return back()->withErrors([
                'auth' => 'Kayıt sırasında bir hata oluştu.',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Başarıyla çıkış yaptınız.');
    }
}
