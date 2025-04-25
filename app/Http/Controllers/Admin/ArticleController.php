<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required',
            'excerpt'      => 'nullable|string',
            'thumbnail'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category'     => 'required|string|max:100',
            'author'       => 'required|string|max:100',
            'status'       => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
        ]);

        $baseSlug = Str::slug($validated['title']);
        $slug     = $baseSlug;
        $i        = 1;
        while (Article::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $i++;
        }
        $validated['slug'] = $slug;

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Article::create($validated);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artikel berhasil disimpan!');
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required',
            'excerpt'      => 'nullable|string',
            'thumbnail'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category'     => 'required|string|max:100',
            'author'       => 'required|string|max:100',
            'status'       => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
        ]);

        if ($validated['title'] !== $article->title) {
            $baseSlug = Str::slug($validated['title']);
            $slug     = $baseSlug;
            $i        = 1;
            while (Article::where('slug', $slug)->where('id', '!=', $article->id)->exists()) {
                $slug = $baseSlug . '-' . $i++;
            }
            $validated['slug'] = $slug;
        } else {
            $validated['slug'] = $article->slug;
        }

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $article->update($validated);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }
}
