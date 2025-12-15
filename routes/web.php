<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Root
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('products.index');
    }

    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Guest routes (Login & Register)
|--------------------------------------------------------------------------
| Giriş yapmış kullanıcı bu sayfalara giremez
*/
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.post');
});

/*
|--------------------------------------------------------------------------
| Authenticated routes
|--------------------------------------------------------------------------
| Sadece giriş yapan kullanıcılar erişebilir
*/
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Product CRUD
    Route::resource('products', ProductController::class)
        ->only([
            'index',
            'create',
            'store',
            'show',
            'edit',
            'update',
            'destroy'
        ]);
});
