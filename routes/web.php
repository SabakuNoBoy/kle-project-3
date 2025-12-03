<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Welcome sayfası
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Anasayfa (products.index) yönlendirmesi ve kontrol
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('products.index');
    } else {
        return redirect()->route('login')->with('error', 'Verileri görmek için giriş yapmalısınız.');
    }
});

// Product CRUD (sadece giriş yapmış kullanıcılar)
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
});
