@extends('layouts.app')

@section('title', 'Ürün Detayı')

@section('content')
<div class="card p-4">
    <h3>{{ $product->product_name }}</h3>
    <p><strong>Fiyat:</strong> {{ $product->product_price }} ₺</p>
    <p><strong>Açıklama:</strong> {{ $product->description }}</p>

    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Düzenle</a>

    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</button>
    </form>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">Geri</a>
</div>
@endsection
