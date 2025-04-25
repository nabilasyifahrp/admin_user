@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">Semua Artikel</h2>
  @forelse($articles as $article)
    <div class="card mb-3">
      <div class="card-body">
        <h3>
          <a href="{{ route('artikel.show', $article->slug) }}">
            {{ $article->title }}
          </a>
        </h3>
        <p class="text-muted">
          {{ $article->published_at->format('d M Y') }} by {{ $article->author }}
        </p>
        <p>{{ $article->excerpt }}</p>
        <a href="{{ route('artikel.show', $article->slug) }}" class="btn btn-sm btn-primary">
          Baca Selengkapnya
        </a>
      </div>
    </div>
  @empty
    <p>Tidak ada artikel untuk ditampilkan.</p>
  @endforelse

  {{ $articles->links() }}
</div>
@endsection
