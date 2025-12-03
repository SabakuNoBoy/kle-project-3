@extends('layouts.app')

@section('title', 'Hoşgeldiniz')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center min-vh-100 p-3">

    {{-- Flash mesaj --}}
    @if(session('error'))
        <div class="alert alert-danger w-100 text-center mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="card p-5 shadow-lg" style="max-width: 500px; width: 100%; border-radius: 1rem;">
        <h1 class="text-center mb-4">Hoşgeldiniz!</h1>
        <p class="text-center text-muted mb-4">
            Ürünleri görebilmek ve CRUD işlemleri yapmak için giriş yapmalısınız.
        </p>

        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2 w-100">Giriş Yap</a>
            <a href="{{ route('register') }}" class="btn btn-success px-4 py-2 w-100">Kayıt Ol</a>
        </div>
    </div>

    <p class="text-center text-muted mt-4">Laravel CRUD Projesine Hoşgeldiniz</p>

</div>
@endsection
