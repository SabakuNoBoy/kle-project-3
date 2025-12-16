@extends('layouts.app')

@section('title', 'Ana Sayfa')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
    <h2>Ürünler</h2>
    <a href="{{ route('products.create') }}" class="cp-neon-link">Yeni Ürün Ekle</a>
</div>

@if(isset($products) && $products->count())
<div class="cp-content">
    <h2>Ürünler</h2>

    <table class="cp-product-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ürün Adı</th>
                <th>Fiyat</th>
                <th>Açıklama</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_price }} ₺</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}">Göster</a>
                    <a href="{{ route('products.edit', $product->id) }}">Düzenle</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Sil</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@else
    <div class="alert alert-info">Henüz ürün eklenmemiş.</div>
@endif
@endsection
