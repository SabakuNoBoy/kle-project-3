@extends('layouts.app')

@section('title', 'Giriş Yap')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card p-4">
            <h3 class="mb-3">Giriş Yap</h3>

            {{-- Flash mesaj --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Validation hataları --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Şifre</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button class="btn btn-primary w-100">Giriş Yap</button>
            </form>

            <p class="mt-3 text-center">Hesabınız yok mu? <a href="{{ route('register') }}">Kayıt Ol</a></p>
        </div>
    </div>
</div>
@endsection
