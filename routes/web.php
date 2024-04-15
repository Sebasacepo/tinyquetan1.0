<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/articles', [ArticlesController::class, 'index'])->name('article.index');

Route::get('/articles/create', [ArticlesController::class, 'create'])->name('article.create');

Route::get('/articles/edit/{id}', [ArticlesController::class, 'edit'])->name('article.edit');

Route::post('/articles/store', [ArticlesController::class, 'store'])->name('article.store');

Route::put('/articles/update', [ArticlesController::class, 'update'])->name('article.update');

Route::delete('/articles/delete/{id}', [ArticlesController::class, 'delete'])->name('article.delete');
