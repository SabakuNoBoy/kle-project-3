@extends('layouts.app')

@section('content')
<div class="cp-panel">
    <h3 class="cp-title">ÜRÜN DETAYI</h3>

    <div class="cp-row">
        <div class="cp-label">ÜRÜN ADI</div>
        <div class="cp-control">{{ $product->product_name }}</div>
    </div>

    <div class="cp-row">
        <div class="cp-label">FİYAT</div>
        <div class="cp-control">{{ $product->product_price }} ₺</div>
    </div>

    <div class="cp-row">
        <div class="cp-label">AÇIKLAMA</div>
        <div class="cp-control">{{ $product->description }}</div>
    </div>

    <div class="d-flex gap-3 mt-4">
        <a href="{{ route('products.edit', $product) }}" class="cp-button" style="width:auto">
            DÜZENLE
        </a>

        <form method="POST" action="{{ route('products.destroy', $product) }}">
            @csrf
            @method('DELETE')
            <button class="cp-button" style="width:auto">SİL</button>
        </form>
    </div>
</div>
@endsection
