@extends('layouts.auth')


{{-- Success mesajı --}}
@if (session('success'))
    <div class="cp-success">
        {{ session('success') }}
    </div>
@endif

{{-- Auth / genel hata --}}
@error('auth')
    <div class="cp-error">{{ $message }}</div>
@enderror


@section('content')
<div class="cp-auth-terminal">
    <h1>KLE</h1>
    <span class="cp-auth-sub">Yeni Kullanıcı</span>

 

    <form method="POST" action="{{ route('register.post') }}">
        @csrf

        <label>İSİM SOYİSİM</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <div class="cp-error">{{ $message }}</div>
        @enderror

        <label>EMAIL</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="cp-error">{{ $message }}</div>
        @enderror

        <label>ŞİFRE</label>
        <input type="password" name="password">
        @error('password')
            <div class="cp-error">{{ $message }}</div>
        @enderror

        <label>ŞİFRE TEKRAR</label>
        <input type="password" name="password_confirmation">
        @error('password_confirmation')
            <div class="cp-error">{{ $message }}</div>
        @enderror

        <button class="cp-auth-btn">OLUŞTUR</button>
    </form>

    <div class="cp-auth-footer">
        <span class="cp-muted-text">HESABIN ZATEN VAR MI?</span>
        <a href="{{ route('login') }}" class="cp-neon-link">GİRİŞ YAP</a>
    </div>
</div>
@endsection
