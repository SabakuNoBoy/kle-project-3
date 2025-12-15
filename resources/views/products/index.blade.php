@extends('layouts.app')

@section('content')
<div class="cp-panel">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="cp-title">ÜRÜNLER</h3>
      
    </div>

    @if($products->count())
        @foreach($products as $product)
            <div class="cp-row">
                <div class="cp-label">
                    {{ $product->product_name }}
                </div>

                <div class="cp-control d-flex justify-content-between">
                    <span>{{ $product->product_price }} ₺</span>

                    <a href="{{ route('products.show', $product) }}" class="cp-link">
                        GÖSTER
                    </a>
                </div>
            </div>
        @endforeach
    @else
        <p>Ürün bulunamadı.</p>
    @endif
</div>
@endsection
