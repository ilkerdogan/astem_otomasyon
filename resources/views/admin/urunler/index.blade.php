@extends('layouts.admin')

@section('title', 'Ürünler')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Ürünler</h1>
        <a href="{{ route('admin.products.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
            + Yeni Ürün
        </a>
    </div>

    @if($products->isEmpty())
        <div class="bg-white rounded-xl border border-gray-200 p-8 text-center text-gray-500">
            Henüz ürün eklenmemiş.
        </div>
    @else
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="text-left px-4 py-3 font-medium text-gray-600">Ürün Adı</th>
                        <th class="text-left px-4 py-3 font-medium text-gray-600 hidden sm:table-cell">Ürün Kodu</th>
                        <th class="text-left px-4 py-3 font-medium text-gray-600">Kategori</th>
                        <th class="text-right px-4 py-3 font-medium text-gray-600">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium text-gray-800">{{ $product->name }}</td>
                            <td class="px-4 py-3 text-gray-500 font-mono text-xs hidden sm:table-cell">{{ $product->code }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $product->category?->name ?? '—' }}</td>
                            <td class="px-4 py-3 text-right space-x-3">
                                <a href="{{ route('admin.products.edit', $product) }}"
                                   class="text-blue-600 hover:underline text-xs font-medium">Düzenle</a>

                                <form method="POST"
                                      action="{{ route('admin.products.destroy', $product) }}"
                                      class="inline"
                                      onsubmit="return confirm('Bu ürünü silmek istediğinizden emin misiniz?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline text-xs font-medium">
                                        Sil
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
