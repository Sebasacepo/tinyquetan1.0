<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CommentsController;

Route::get('/comments', [CommentsController::class, 'index'])->name('comment.index');

Route::get('/comments/create', [CommentsController::class, 'create'])->name('comment.create');

Route::get('/comments/edit/{id}', [CommentsController::class, 'edit'])->name('comment.edit');

Route::post('/comments/store', [CommentsController::class, 'store'])->name('comment.store');

Route::put('/comments/update', [CommentsController::class, 'update'])->name('comment.update');

Route::delete('/comments/delete/{id}', [CommentsController::class, 'delete'])->name('comment.delete');


?>
