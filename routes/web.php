<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogsController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home/home');
});

Route::resource('/users', UserController::class)->middleware([
    'create' => 'permission:create-users',
    'store' => 'permission:create-users',
    'edit' => 'permission:edit-users',
    'update' => 'permisison:edit-users',
    'delete' => 'permission:delete-users',
    'index' => 'permission:view-users',
    'show' =>'permission:view-users'

]);

Route::get('\user\{id}',[UserController::class, 'show'])->name('admin');




//----------------------------------Articles--------------------------------------------------------


Route::get('/articles', [ArticlesController::class, 'index'])->name('article.index');

Route::get('/articles/create', [ArticlesController::class, 'create'])->name('article.create');

Route::get('/articles/edit/{id}', [ArticlesController::class, 'edit'])->name('article.edit');

Route::post('/articles/store', [ArticlesController::class, 'store'])->name('article.store');

Route::put('/articles/update', [ArticlesController::class, 'update'])->name('article.update');

Route::delete('/articles/delete/{id}', [ArticlesController::class, 'delete'])->name('article.delete');

//------------------------Blogs-----------------------------------------------------------------------

Route::get('/blogs', [BlogsController::class, 'index'])->name('blog.index');

Route::get('/blogs/create', [BlogsController::class, 'create'])->name('blog.create');

Route::get('/blogs/edit/{id}', [BlogsController::class, 'edit'])->name('blog.edit');

Route::post('/blogs/store', [BlogsController::class, 'store'])->name('blog.store');

Route::put('/blogs/update', [BlogsController::class, 'update'])->name('blog.update');

Route::delete('/blogs/delete/{id}', [BlogsController::class, 'delete'])->name('blog.delete');
