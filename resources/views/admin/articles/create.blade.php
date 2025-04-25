@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md mt-8">
    <h2 class="text-2xl font-bold mb-6 text-purple-700 flex items-center gap-2">
        📝 Tambah Artikel Baru
    </h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="title" class="block text-gray-700 font-semibold mb-2">Judul Artikel</label>
            <input type="text" name="title" class="w-full border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="excerpt" class="block text-gray-700 font-semibold mb-2">Excerpt (opsional)</label>
            <textarea name="excerpt" rows="3" class="w-full border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500">{{ old('excerpt') }}</textarea>
        </div>

        <div>
            <label for="content" class="block text-gray-700 font-semibold mb-2">Konten</label>
            <textarea name="content" id="ckeditor" rows="6" class="w-full border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500">{{ old('content') }}</textarea>
        </div>

        <div>
            <label for="thumbnail" class="block text-gray-700 font-semibold mb-2">Thumbnail</label>
            <input type="file" name="thumbnail" class="w-full">
        </div>

        <div>
            <label for="category" class="block text-gray-700 font-semibold mb-2">Kategori</label>
            <input type="text" name="category" class="w-full border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500" value="{{ old('category') }}" required>
        </div>

        <div>
            <label for="author" class="block text-gray-700 font-semibold mb-2">Author</label>
            <input type="text" name="author" class="w-full border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500" value="{{ old('author') }}" required>
        </div>

        <div>
            <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
            <select name="status" class="w-full border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500" required>
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>

        <div>
            <label for="published_at" class="block text-gray-700 font-semibold mb-2">Tanggal Publish</label>
            <input type="datetime-local" name="published_at" class="w-full border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500" value="{{ old('published_at') }}">
        </div>

        <div class="text-right">
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-6 rounded-lg">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#ckeditor'))
    .catch(error => {
        console.error(error);
    });
</script>
@endpush
