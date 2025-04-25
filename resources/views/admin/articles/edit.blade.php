@extends('layouts.admin')

@section('content')
<div class="container mt-4">
  <h2 class="mb-4">Edit Artikel</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="title" class="form-label">Judul Artikel</label>
      <input type="text" name="title" class="form-control" value="{{ old('title', $article->title) }}" required>
    </div>

    <div class="mb-3">
      <label for="excerpt" class="form-label">Excerpt</label>
      <textarea name="excerpt" class="form-control">{{ old('excerpt', $article->excerpt) }}</textarea>
    </div>

    <div class="mb-3">
      <label for="content" class="form-label">Konten</label>
      <textarea name="content" id="ckeditor" class="form-control">{{ old('content', $article->content) }}</textarea>
    </div>

    <div class="mb-3">
      <label for="thumbnail" class="form-label">Thumbnail Saat Ini</label><br>
      @if ($article->thumbnail)
        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail" width="200" class="mb-2">
      @endif
      <input type="file" name="thumbnail" class="form-control">
    </div>

    <div class="mb-3">
      <label for="category" class="form-label">Kategori</label>
      <input type="text" name="category" class="form-control" value="{{ old('category', $article->category) }}" required>
    </div>

    <div class="mb-3">
      <label for="author" class="form-label">Author</label>
      <input type="text" name="author" class="form-control" value="{{ old('author', $article->author) }}" required>
    </div>

    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select name="status" class="form-select" required>
        <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>Published</option>
        <option value="archived" {{ old('status', $article->status) == 'archived' ? 'selected' : '' }}>Archived</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="published_at" class="form-label">Tanggal Publish</label>
      <input type="datetime-local" name="published_at" class="form-control"
        value="{{ old('published_at', \Carbon\Carbon::parse($article->published_at)->format('Y-m-d\TH:i')) }}">
    </div>

    <button type="submit" class="btn btn-primary">Update Artikel</button>
  </form>
</div>
@endsection

@push('scripts')
  {{-- CKEditor --}}
  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
      .create(document.querySelector('#ckeditor'))
      .catch(error => console.error(error));
  </script>
@endpush
