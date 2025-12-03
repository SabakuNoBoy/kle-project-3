<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'description' => 'required',
        ]);

        Product::create($request->only(['product_name', 'product_price', 'description']));
        return redirect()->route('products.index')->with('success', 'Ürün eklendi!');
    }

    public function show(Product $product) {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product) {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product) {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'description' => 'required',
        ]);

        $product->update($request->only(['product_name', 'product_price', 'description']));
        return redirect()->route('products.index')->with('success', 'Ürün güncellendi!');
    }

    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Ürün silindi!');
    }
}
