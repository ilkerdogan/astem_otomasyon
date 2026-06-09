@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-500 text-sm mt-1">Hoş geldiniz, katalog yönetimine buradan ulaşabilirsiniz.</p>
    </div>

    <!-- İstatistik Kartları -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center gap-4">
            <div class="bg-blue-100 text-blue-600 rounded-lg p-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Toplam Kategori</p>
                <p class="text-3xl font-bold text-gray-800">{{ $categoryCount }}</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center gap-4">
            <div class="bg-blue-100 text-blue-600 rounded-lg p-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Toplam Ürün</p>
                <p class="text-3xl font-bold text-gray-800">{{ $productCount }}</p>
            </div>
        </div>

    </div>

    <!-- Hızlı Erişim -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <a href="{{ route('admin.categories.index') }}"
           class="bg-white border border-gray-200 rounded-xl p-5 hover:border-blue-400 hover:shadow transition-all flex items-center justify-between group">
            <span class="font-medium text-gray-700 group-hover:text-blue-600 transition-colors">Kategorileri Yönet</span>
            <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
        <a href="{{ route('admin.products.index') }}"
           class="bg-white border border-gray-200 rounded-xl p-5 hover:border-blue-400 hover:shadow transition-all flex items-center justify-between group">
            <span class="font-medium text-gray-700 group-hover:text-blue-600 transition-colors">Ürünleri Yönet</span>
            <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>
@endsection
