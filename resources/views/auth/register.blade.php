@extends('layouts.auth')

@section('content')
<div class="cp-auth-terminal">
    <h1>KLE</h1>
    <span class="cp-auth-sub">Yeni Kullanıcı</span>

    <form method="POST" action="{{ route('register.post') }}">
        @csrf

        <label>İSİM</label>
        <input type="text" name="name">

        <label>EMAIL</label>
        <input type="email" name="email">

        <label>ŞİFRE</label>
        <input type="password" name="password">

        <button class="cp-auth-btn">OLUŞTUR</button>
    </form>

    <div class="cp-auth-footer">
    <span class="cp-muted-text">
        HESABIN ZATEN VAR MI? 
    </span>

    <a href="{{ route('login') }}" class="cp-neon-link">
        GİRİŞ YAP
    </a>
</div>
@endsection
