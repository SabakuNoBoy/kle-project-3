<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Auth kontrolü middleware ile yapılacak
    }

    public function rules(): array
    {
        return [
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric|min:0',
            'description' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'product_name.required' => 'Ürün adı zorunludur.',
            'product_price.required' => 'Ürün fiyatı zorunludur.',
            'product_price.numeric' => 'Ürün fiyatı sayısal olmalıdır.',
            'description.required' => 'Ürün açıklaması zorunludur.',
        ];
    }
}
