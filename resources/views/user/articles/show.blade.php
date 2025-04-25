@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h2>{{ $article->title }}</h2>
  <p class="text-muted">
    {{ $article->published_at->format('d M Y, H:i') }} by {{ $article->author }}
  </p>
  @if($article->thumbnail)
    <img src="{{ asset('storage/' . $article->thumbnail) }}" class="img-fluid mb-4" alt="Thumbnail">
  @endif
  <div>{!! $article->content !!}</div>
  <a href="{{ route('artikel.index') }}" class="btn btn-secondary mt-4">Kembali ke Daftar Artikel</a>
</div>
@endsection
