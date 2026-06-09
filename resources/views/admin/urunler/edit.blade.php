@extends('layouts.admin')

@section('title', 'Ürün Düzenle')

@section('content')
    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.products.index') }}" class="text-gray-400 hover:text-gray-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Ürün Düzenle</h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 max-w-2xl">
        <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Ürün Adı <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name"
                       value="{{ old('name', $product->name) }}"
                       class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-400 @else border-gray-300 @enderror">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="code" class="block text-sm font-medium text-gray-700 mb-1">
                    Ürün Kodu <span class="text-red-500">*</span>
                </label>
                <input type="text" id="code" name="code"
                       value="{{ old('code', $product->code) }}"
                       class="w-full border rounded-lg px-3 py-2 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-blue-500 @error('code') border-red-400 @else border-gray-300 @enderror">
                @error('code')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">
                    Kategori <span class="text-red-500">*</span>
                </label>
                <select id="category_id" name="category_id"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('category_id') border-red-400 @else border-gray-300 @enderror">
                    <option value="">— Kategori seçin —</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                        Ürün Görseli
                    </label>
                    @if($product->image_path)
                        <div class="mb-2 flex items-center gap-3">
                            <img src="{{ Storage::url($product->image_path) }}"
                                 alt="{{ $product->name }}"
                                 class="h-20 w-20 object-cover rounded-lg border border-gray-200">
                            <p class="text-xs text-gray-400">Mevcut görsel. Yeni görsel yüklerseniz eski silinir.</p>
                        </div>
                    @endif
                    <input type="file" id="image" name="image"
                           accept="image/jpeg,image/png,image/webp"
                           class="w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('image') border border-red-400 rounded-lg p-1 @enderror">
                    <p class="text-xs text-gray-400 mt-1">Maks. 2MB — JPG, PNG veya WebP. Boş bırakırsanız mevcut görsel korunur.</p>
                    @error('image')
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
                           value="{{ old('meta_title', $product->meta_title) }}"
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
                              class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('meta_description') border-red-400 @enderror">{{ old('meta_description', $product->meta_description) }}</textarea>
                    @error('meta_description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-1">Anahtar Kelimeler</label>
                    <input type="text" id="meta_keywords" name="meta_keywords"
                           value="{{ old('meta_keywords', $product->meta_keywords) }}"
                           placeholder="kablo, enerji, sigorta"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('meta_keywords') border-red-400 @enderror">
                    <p class="text-xs text-gray-400 mt-1">Virgülle ayırarak yazın.</p>
                    @error('meta_keywords')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-5 py-2 rounded-lg transition-colors">
                    Güncelle
                </button>
                <a href="{{ route('admin.products.index') }}"
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium px-5 py-2 rounded-lg transition-colors">
                    İptal
                </a>
            </div>
        </form>
    </div>
@endsection
