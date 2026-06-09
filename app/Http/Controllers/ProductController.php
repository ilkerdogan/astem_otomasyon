<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $q = trim($request->get('q', ''));

        if ($q === '') {
            return view('arama', [
                'products'        => collect(),
                'query'           => '',
                'pageTitle'       => 'Ürün Arama | Astem Otomasyon',
                'metaDescription' => 'Astem Otomasyon ürün kataloğunda arama yapın.',
            ]);
        }

        $products = Product::with('category')
            ->where('name', 'LIKE', '%' . $q . '%')
            ->orWhere('code', 'LIKE', '%' . $q . '%')
            ->orderBy('name')
            ->get();

        return view('arama', [
            'products'        => $products,
            'query'           => $q,
            'pageTitle'       => '"' . $q . '" için arama sonuçları | Astem Otomasyon',
            'metaDescription' => 'Astem Otomasyon ürün kataloğunda "' . $q . '" arama sonuçları.',
        ]);
    }
}
