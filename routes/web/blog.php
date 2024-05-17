<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogsController;
use App\Http\Middleware\AuthorizedMiddleware;


Route::get('/blogs', [BlogsController::class, 'index'])->name('blog.index')
                                                       ->middleware(AuthorizedMiddleware::class. ':Contenidos.showContent');

Route::get('/blogs/create', [BlogsController::class, 'create'])->name('blog.create')
                                                               ->middleware(AuthorizedMiddleware::class.':Contenidos.createContent');

Route::get('/blogs/edit/{id}', [BlogsController::class, 'edit'])->name('blog.edit')
                                                                ->middleware(AuthorizedMiddleware::class.':Contenidos.updateContent');

Route::post('/blogs/store', [BlogsController::class, 'store'])->name('blog.store')
                                                              ->middleware(AuthorizedMiddleware::class.':Contenidos.createContent');

Route::put('/blogs/update', [BlogsController::class, 'update'])->name('blog.update')
                                                               ->middleware(AuthorizedMiddleware::class.':Contenidos.updateContent');

Route::delete('/blogs/delete/{id}', [BlogsController::class, 'delete'])->name('blog.delete')
                                                                       ->middleware(AuthorizedMiddleware::class.':Contenidos.deleContent');


?>
