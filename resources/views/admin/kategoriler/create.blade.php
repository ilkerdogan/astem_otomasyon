@extends('layouts.admin')

@section('title', 'Yeni Kategori')

@section('content')
    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.categories.index') }}" class="text-gray-400 hover:text-gray-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Yeni Kategori</h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 max-w-2xl">
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Kategori Adı <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name"
                       value="{{ old('name') }}"
                       class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-400 @else border-gray-300 @enderror">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Açıklama</label>
                <textarea id="description" name="description" rows="3"
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-400 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="border-t border-gray-100 pt-4 mt-4 mb-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Arama Motoru (SEO) Alanları</p>

                <div class="mb-4">
                    <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-1">
                        Sayfa Başlığı <span class="text-gray-400 text-xs">(max 60 karakter)</span>
                    </label>
                    <input type="text" id="meta_title" name="meta_title"
                           value="{{ old('meta_title') }}"
                           maxlength="60"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('meta_title') border-red-400 @enderror">
                    @error('meta_title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-1">
                        Sayfa Açıklaması <span class="text-gray-400 text-xs">(max 160 karakter)</span>
                    </label>
                    <textarea id="meta_description" name="meta_description" rows="2"
                              maxlength="160"
                              class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('meta_description') border-red-400 @enderror">{{ old('meta_description') }}</textarea>
                    @error('meta_description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-1">Anahtar Kelimeler</label>
                    <input type="text" id="meta_keywords" name="meta_keywords"
                           value="{{ old('meta_keywords') }}"
                           placeholder="kablo, iletken, enerji kablosu"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('meta_keywords') border-red-400 @enderror">
                    <p class="text-xs text-gray-400 mt-1">Virgülle ayırarak yazın. Örnek: kablo, iletken, enerji kablosu</p>
                    @error('meta_keywords')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-5 py-2 rounded-lg transition-colors">
                    Kaydet
                </button>
                <a href="{{ route('admin.categories.index') }}"
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium px-5 py-2 rounded-lg transition-colors">
                    İptal
                </a>
            </div>
        </form>
    </div>
@endsection
