@extends('layouts.auth')

@section('content')
<div class="cp-auth-terminal">
    <h1>KLE</h1>
    <span class="cp-auth-sub">Giriş Ekranı</span>

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <label>EMAIL</label>
        <input type="email" name="email">

        <label>ŞİFRE</label>
        <input type="password" name="password">

        <button class="cp-auth-btn">GİRİŞ YAP</button>
    </form>

    <div class="cp-auth-footer">
    <span class="cp-muted-text">
        Eğer hala bir hesabın yoksa 
    </span>

    <a href="{{ route('register') }}" class="cp-neon-link">
        HESAP OLUŞTUR
    </a>
</div>
</div>
@endsection
