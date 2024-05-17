<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogsController;
use App\Http\Middleware\AuthorizedMiddleware;

Route::get('/articles', [ArticlesController::class, 'index'])->name('article.index')
                                                             ->middleware(AuthorizedMiddleware::class. ':Contenidos.showContent');

Route::get('/articles/create', [ArticlesController::class, 'create'])->name('article.create')->middleware(AuthorizedMiddleware::class.':Contenidos.createContent');

Route::get('/articles/edit/{id}', [ArticlesController::class, 'edit'])->name('article.edit')->middleware(AuthorizedMiddleware::class.':Contenidos.updateContent');

Route::post('/articles/store', [ArticlesController::class, 'store'])->name('article.store')->middleware(AuthorizedMiddleware::class.':Contenidos.createContent');

Route::put('/articles/update', [ArticlesController::class, 'update'])->name('article.update')->middleware(AuthorizedMiddleware::class.':Contenidos.updateContent');

Route::delete('/articles/delete/{id}', [ArticlesController::class, 'delete'])->name('article.delete')->middleware(AuthorizedMiddleware::class.':Contenidos.deleContent');


?>
