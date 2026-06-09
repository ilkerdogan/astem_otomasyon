<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCategories = Category::query()
            ->whereHas('products')
            ->orderBy('name')
            ->with(['products' => function ($query) {
                $query->latest('id');
            }])
            ->take(6)
            ->get();

        return view('home', [
            'featuredCategories' => $featuredCategories,
            'pageTitle'          => 'Astem Otomasyon | Elektrik Malzemeleri',
            'metaDescription'    => 'Astem Otomasyon – 25 yılı aşkın deneyimiyle endüstriyel elektrik malzemeleri ve otomasyon ürünleri tedariki. Ürün kataloğunu inceleyin.',
        ]);
    }
}
