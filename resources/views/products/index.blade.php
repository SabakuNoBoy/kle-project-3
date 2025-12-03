@extends('layouts.app')

@section('title', 'Ana Sayfa')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
    <h2>Ürünler</h2>
    <a href="{{ route('products.create') }}" class="btn btn-success mt-2 mt-md-0">Yeni Ürün Ekle</a>
</div>

@if($products->count())
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
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
                <td>{{ Str::limit($product->description, 50) }}</td>
                <td class="d-flex flex-wrap gap-1">
                    <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">Göster</a>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Düzenle</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</button>
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
