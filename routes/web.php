<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
//Usuarios
Route::resource('/users', UserController::class);

Route::get('\user\{id}',[UserController::class, 'show']);




//Articulos
Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');



