@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-200 via-purple-300 to-purple-500 py-12 px-6 text-white">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold flex items-center gap-2">
                📋 <span class="drop-shadow">Daftar Artikel</span>
            </h2>
            <a href="{{ route('admin.articles.create') }}"
               class="bg-white text-purple-600 font-semibold px-4 py-2 rounded-xl shadow hover:bg-purple-100 transition">
                + Tambah Artikel
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <table class="min-w-full text-sm text-gray-700">
                <thead class="bg-purple-200 text-purple-800 text-left">
                    <tr>
                        <th class="px-6 py-4">Judul</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Penulis</th>
                        <th class="px-6 py-4">Tgl. Publish</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-purple-100">
                    @forelse ($articles as $article)
                    <tr class="bg-white hover:bg-purple-50 transition">
                        <td class="px-6 py-4">{{ $article->title }}</td>
                        <td class="px-6 py-4">{{ $article->category }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-gray-200 text-gray-700">
                                {{ ucfirst($article->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $article->author }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-3">
                                <a href="{{ route('admin.articles.edit', $article->id) }}"
                                   class="inline-flex items-center gap-1 px-3 py-1 bg-purple-600 text-white text-xs font-semibold rounded-full shadow hover:bg-purple-700 transition">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center gap-1 px-3 py-1 bg-rose-500 text-white text-xs font-semibold rounded-full shadow hover:bg-rose-600 transition">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada artikel.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
