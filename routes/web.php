<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControll;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\User\ArticleController as UserArticleController;
use App\Http\Middleware\IsAdmin;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthControll::class, 'login'])->name('login');
    Route::post('/login', [AuthControll::class, 'authenticate'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
// });

// Route::middleware('guest')->group(function () {
    
    // Route::get('/halaman', function () {
        //     return view('halaman');
        // })->name('halaman');

        Route::middleware(['auth', 'is_admin'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
            Route::resource('articles', App\Http\Controllers\Admin\ArticleController::class);
        });
    
        
       
        Route::middleware(['auth', 'is_user'])
        ->prefix('artikel')
        ->name('artikel.')
        ->group(function () {
            Route::get('/', [App\Http\Controllers\User\ArticleController::class, 'index'])->name('index');
            Route::get('/{slug}', [App\Http\Controllers\User\ArticleController::class, 'show'])->name('show');
        });
 //   });
    
Route::post('/logout', [AuthControll::class, 'logout'])->name('logout');
