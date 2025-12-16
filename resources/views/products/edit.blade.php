@extends('layouts.app')

@section('content')
<div class="cp-panel">
    <h3 class="cp-title">ÜRÜNÜ DÜZENLE</h3>

    {{-- Flash Mesajlar --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-2">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 text-red-800 p-2 rounded mb-2">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')

        <div class="cp-create-row">
            <div class="cp-label">ÜRÜN ADI</div>
            <div class="cp-control">
                <input type="text" name="product_name" value="{{ old('product_name', $product->product_name) }}" class="cp-input">
                @error('product_name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="cp-create-row">
            <div class="cp-label">FİYAT</div>
            <div class="cp-control">
                <input type="number" name="product_price" value="{{ old('product_price', $product->product_price) }}" class="cp-input">
                @error('product_price')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="cp-create-row">
            <div class="cp-label">AÇIKLAMA</div>
            <div class="cp-control">
                <textarea name="description" class="cp-input">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button class="cp-button">GÜNCELLE</button>
    </form>
</div>
@endsection
