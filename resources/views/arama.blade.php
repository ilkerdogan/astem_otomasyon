@extends('layouts.app')

@section('title', $pageTitle)
@section('meta_description', $metaDescription)

@section('content')

{{-- Results --}}
<section class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4">

        @if($query === '')
            <div class="bg-white rounded-xl border border-gray-200 p-12 text-center text-gray-500">
                Aramak için bir kelime girin.
            </div>

        @elseif($products->isEmpty())
            <div class="bg-white rounded-xl border border-gray-200 p-12 text-center">
                <p class="text-gray-500">
                    "<span class="font-medium text-gray-700">{{ $query }}</span>" ile eşleşen ürün bulunamadı.
                </p>
                <a href="/" class="text-[#1e3a5f] hover:underline text-sm mt-3 inline-block">
                    Ana sayfaya dön →
                </a>
            </div>

        @else
            <p class="text-sm text-gray-500 mb-6">
                "<span class="font-medium text-gray-700">{{ $query }}</span>" için
                <span class="font-semibold text-gray-800">{{ $products->count() }}</span> sonuç bulundu.
            </p>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach($products as $product)
                <div class="group bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden
                            hover:shadow-md hover:border-[#3b82f6] transition-all duration-200">

                    {{-- Ürün Görseli --}}
                    <div class="aspect-square overflow-hidden bg-gray-50">
                        <img
                            src="{{ $product->image_path ? '/storage/' . $product->image_path : asset('images/default-product.png') }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                            loading="lazy">
                    </div>

                    {{-- Ürün Bilgisi --}}
                    <div class="p-4">
                        <h2 class="font-semibold text-gray-800 text-sm leading-snug mb-1 transition-transform duration-300 group-hover:scale-[1.03]">
                            {{ $product->name }}
                        </h2>
                        <p class="text-xs text-gray-400 font-mono mb-1 transition-transform duration-300 group-hover:scale-[1.02]">
                            {{ $product->code }}
                        </p>
                        @if($product->category)
                            <span class="text-xs text-gray-500 inline-block">
                                {{ $product->category->name }}
                            </span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

@endsection
