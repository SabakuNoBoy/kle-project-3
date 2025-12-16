<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('dashboard', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        try {
            Product::create($request->validated());

            return redirect()
                ->route('dashboard')
                ->with('success', 'Ürün başarıyla eklendi');

        } catch (Exception $e) {
            return back()->with('error', 'Ürün eklenemedi');
        }
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        try {
            $product->update($request->validated());

            return redirect()
                ->route('products.show', $product)
                ->with('success', 'Ürün güncellendi');

        } catch (Exception $e) {
            return back()->with('error', 'Güncelleme başarısız');
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();

            return redirect()
                ->route('dashboard')
                ->with('success', 'Ürün silindi');

        } catch (Exception $e) {
            return back()->with('error', 'Silme işlemi başarısız');
        }
    }
}
