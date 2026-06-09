<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductAdminController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderBy('name')->get();

        return view('admin.urunler.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.urunler.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        unset($data['image']);
        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Ürün başarıyla oluşturuldu.');
    }

    public function edit(Product $urunler)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.urunler.edit', [
            'product'    => $urunler,
            'categories' => $categories,
        ]);
    }

    public function update(UpdateProductRequest $request, Product $urunler)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($urunler->image_path) {
                Storage::disk('public')->delete($urunler->image_path);
            }
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        unset($data['image']);
        $urunler->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Ürün başarıyla güncellendi.');
    }

    public function destroy(Product $urunler)
    {
        if ($urunler->image_path) {
            Storage::disk('public')->delete($urunler->image_path);
        }

        $urunler->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Ürün başarıyla silindi.');
    }
}
