<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class UserArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('status', 'published')->orderByDesc('published_at')->get();
        return view('user.articles.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->where('status', 'published')->firstOrFail();
        return view('user.articles.show', compact('article'));
    }
}

