<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('urunler')?->id ?? $this->route('urunler');

        return [
            'name'             => 'required|string|max:255',
            'code'             => 'required|string|max:100|unique:products,code,' . $productId,
            'category_id'      => 'required|exists:categories,id',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'meta_title'       => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords'    => 'nullable|string|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'name'        => 'ürün adı',
            'code'        => 'ürün kodu',
            'category_id' => 'kategori',
        ];
    }
}
