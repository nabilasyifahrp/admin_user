@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-purple-50 py-12 px-6 text-gray-800">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow">
        <h1 class="text-3xl font-bold text-purple-700 mb-4">{{ $article->title }}</h1>
        <p class="text-sm text-gray-500 mb-4">Kategori: {{ $article->category }} | Penulis: {{ $article->author }} | {{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}</p>

        @if ($article->thumbnail)
        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail" class="mb-6 rounded-xl w-full">
        @endif

        <div class="prose max-w-none">
            {!! $article->content !!}
        </div>

        <a href="{{ route('artikel.index') }}" class="mt-8 inline-block text-purple-600 hover:underline">← Kembali ke daftar artikel</a>
    </div>
</div>
@endsection
