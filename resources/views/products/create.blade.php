@extends('layouts.app')

@section('title', 'Ürün Ekle')

@section('content')
<div class="card p-4">
    <h3>Yeni Ürün Ekle</h3>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_name" class="form-label">Ürün Adı</label>
            <input type="text" class="form-control" name="product_name" id="product_name" value="{{ old('product_name') }}" required>
        </div>
        <div class="mb-3">
            <label for="product_price" class="form-label">Fiyat</label>
            <input type="number" step="0.01" class="form-control" name="product_price" id="product_price" value="{{ old('product_price') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Açıklama</label>
            <textarea class="form-control" name="description" id="description" rows="3" required>{{ old('description') }}</textarea>
        </div>
        <button class="btn btn-primary">Kaydet</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Geri</a>
    </form>
</div>
@endsection
