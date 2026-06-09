@extends('layouts.app')

@section('meta')
    <meta name="robots" content="noindex, nofollow">
@endsection

@section('title', 'Sayfa Bulunamadı — Astem Otomasyon')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
        <p class="text-6xl font-bold text-[#3b82f6]">404</p>
        <h1 class="mt-4 text-2xl font-semibold text-gray-900">Sayfa Bulunamadı</h1>
        <p class="mt-2 text-gray-500">Aradığınız sayfa mevcut değil veya taşınmış olabilir.</p>
        <a href="/"
           class="mt-6 inline-block bg-[#1e3a5f] text-white text-sm font-medium px-5 py-2.5 rounded-md hover:bg-[#162d4a] transition-colors">
            Ana Sayfaya Dön
        </a>
    </div>
@endsection
