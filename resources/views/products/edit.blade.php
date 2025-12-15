@extends('layouts.app')

@section('content')
<div class="cp-panel">
    <h3 class="cp-title">ÜRÜNÜ DÜZENLE</h3>

    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')

        <div class="cp-row">
            <div class="cp-label">ÜRÜN ADI</div>
            <div class="cp-control">
                <input type="text" name="product_name" value="{{ $product->product_name }}" class="cp-input">
            </div>
        </div>

        <div class="cp-row">
            <div class="cp-label">FİYAT</div>
            <div class="cp-control">
                <input type="number" name="product_price" value="{{ $product->product_price }}" class="cp-input">
            </div>
        </div>

        <div class="cp-row">
            <div class="cp-label">AÇIKLAMA</div>
            <div class="cp-control">
                <textarea name="description" class="cp-input">{{ $product->description }}</textarea>
            </div>
        </div>

        <button class="cp-button">GÜNCELLE</button>
    </form>
</div>
@endsection
