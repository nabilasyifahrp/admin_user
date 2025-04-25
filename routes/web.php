<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControll;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\User\ArticleController as UserArticleController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/login', [AuthControll::class, 'login'])->name('login');
    Route::post('/login', [AuthControll::class, 'authenticating'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthControll::class, 'logout'])->name('logout');

    Route::get('/halaman', function () {
        return view('halaman');
    })->name('halaman');

    Route::middleware('is_admin')
         ->prefix('admin')
         ->name('admin.')
         ->group(function () {
             Route::resource('articles', AdminArticleController::class);
         });

    Route::prefix('artikel')
         ->name('artikel.')
         ->group(function () {
             Route::get('/', [UserArticleController::class, 'index'])->name('index');
             Route::get('/{slug}', [UserArticleController::class, 'show'])->name('show');
         });
});
