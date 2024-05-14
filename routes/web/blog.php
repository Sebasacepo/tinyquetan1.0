<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogsController;


Route::get('/blogs', [BlogsController::class, 'index'])->name('blog.index');

Route::get('/blogs/create', [BlogsController::class, 'create'])->name('blog.create');

Route::get('/blogs/edit/{id}', [BlogsController::class, 'edit'])->name('blog.edit');

Route::post('/blogs/store', [BlogsController::class, 'store'])->name('blog.store');

Route::put('/blogs/update', [BlogsController::class, 'update'])->name('blog.update');

Route::delete('/blogs/delete/{id}', [BlogsController::class, 'delete'])->name('blog.delete');


?>
