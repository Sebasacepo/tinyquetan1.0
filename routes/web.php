<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
