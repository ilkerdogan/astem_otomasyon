@extends('layouts.admin')

@section('title', 'Kategoriler')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Kategoriler</h1>
        <a href="{{ route('admin.categories.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
            + Yeni Kategori
        </a>
    </div>

    @if($categories->isEmpty())
        <div class="bg-white rounded-xl border border-gray-200 p-8 text-center text-gray-500">
            Henüz kategori eklenmemiş.
        </div>
    @else
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="text-left px-4 py-3 font-medium text-gray-600">Kategori Adı</th>
                        <th class="text-left px-4 py-3 font-medium text-gray-600 hidden sm:table-cell">Slug</th>
                        <th class="text-center px-4 py-3 font-medium text-gray-600">Ürün</th>
                        <th class="text-right px-4 py-3 font-medium text-gray-600">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($categories as $category)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium text-gray-800">{{ $category->name }}</td>
                            <td class="px-4 py-3 text-gray-500 hidden sm:table-cell">{{ $category->slug }}</td>
                            <td class="px-4 py-3 text-center text-gray-600">{{ $category->products_count }}</td>
                            <td class="px-4 py-3 text-right space-x-3">
                                <a href="{{ route('admin.categories.edit', $category) }}"
                                   class="text-blue-600 hover:underline text-xs font-medium">Düzenle</a>

                                <form method="POST"
                                      action="{{ route('admin.categories.destroy', $category) }}"
                                      class="inline"
                                      onsubmit="return confirm('Bu kategoriyi silmek istediğinizden emin misiniz?')">
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
