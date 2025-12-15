@extends('layouts.app')

@section('content')
<div class="cp-panel">
    <h3 class="cp-title">ÜRÜN EKLE</h3>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <div class="cp-create-row">
            <div class="cp-label">ÜRÜN ADI</div>
            <div class="cp-control">
                <input type="text" name="product_name" class="cp-input">
            </div>
        </div>

        <div class="cp-create-row">
            <div class="cp-label">FİYAT</div>
            <div class="cp-control">
                <input type="number" name="product_price" class="cp-input">
            </div>
        </div>

        <div class="cp-create-row">
            <div class="cp-label">AÇIKLAMA</div>
            <div class="cp-control">
                <textarea name="description" class="cp-input"></textarea>
            </div>
        </div>

        <button class="cp-button">ÜRÜNÜ KAYDET</button>
    </form>
</div>
@endsection
