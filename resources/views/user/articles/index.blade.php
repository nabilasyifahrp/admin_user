@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-purple-100 py-12 px-6 text-gray-800">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold mb-8">📰 Artikel Tersedia</h2>

        @forelse ($articles as $article)
        <div class="bg-white rounded-xl shadow p-6 mb-6 hover:shadow-lg transition">
            <h3 class="text-xl font-bold text-purple-700 mb-2">
                <a href="{{ route('artikel.show', $article->slug) }}">{{ $article->title }}</a>
            </h3>
            <p class="text-sm text-gray-500 mb-1">Kategori: {{ $article->category }} | Penulis: {{ $article->author }} | {{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}</p>
            <p class="text-gray-700">{{ $article->excerpt }}</p>
            <a href="{{ route('artikel.show', $article->slug) }}" class="text-purple-600 font-semibold mt-2 inline-block">Baca Selengkapnya →</a>
        </div>
        @empty
        <p>Tidak ada artikel yang tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
