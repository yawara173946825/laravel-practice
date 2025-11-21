<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/index', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/show/{id}', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('/articles/edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::patch('/articles/update/{id}', [ArticleController::class, 'update'])->name('articles.update');
});

require __DIR__.'/auth.php';
