<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('status', 'published')
                           ->orderBy('published_at', 'desc')
                           ->paginate(10);

        return view('user.articles.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)
                          ->where('status', 'published')
                          ->firstOrFail();

        return view('user.articles.show', compact('article'));
    }
}
