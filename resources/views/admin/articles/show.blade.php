@extends('layouts.admin')

@section('content')
<div class="container mt-4">
  <h2 class="mb-3">{{ $article->title }}</h2>

  <p><strong>Kategori:</strong> {{ $article->category }}</p>
  <p><strong>Author:</strong> {{ $article->author }}</p>
  <p><strong>Status:</strong> {{ ucfirst($article->status) }}</p>
  <p><strong>Dipublikasikan pada:</strong> {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d M Y, H:i') : '-' }}</p>

  @if ($article->thumbnail)
    <div class="mb-3">
      <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail" width="400" class="img-fluid rounded shadow-sm">
    </div>
  @endif

  <div class="mb-3">
    <h5>Excerpt:</h5>
    <p>{{ $article->excerpt }}</p>
  </div>

  <div class="mb-3">
    <h5>Konten Lengkap:</h5>
    <div>{!! $article->content !!}</div>
  </div>

  <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary mt-3">Kembali ke daftar artikel</a>
</div>
@endsection
