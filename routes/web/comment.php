<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CommentsController;
use App\Http\Middleware\AuthorizedMiddleware;

Route::get('/comments', [CommentsController::class, 'index'])->name('comment.index')
                                                             ->middleware(AuthorizedMiddleware::class. ':Comentarios.showComments');

Route::get('/comments/create', [CommentsController::class, 'create'])->name('comment.create')
                                                                     ->middleware(AuthorizedMiddleware::class. ':Comentarios.createComments');

Route::get('/comments/edit/{id}', [CommentsController::class, 'edit'])->name('comment.edit')
                                                                      ->middleware(AuthorizedMiddleware::class. ':Comentarios.updateComments');

Route::post('/comments/store', [CommentsController::class, 'store'])->name('comment.store')
                                                                    ->middleware(AuthorizedMiddleware::class. ':Comentarios.createComments');

Route::put('/comments/update', [CommentsController::class, 'update'])->name('comment.update')
                                                                     ->middleware(AuthorizedMiddleware::class. ':Comentarios.updateComments');

Route::delete('/comments/delete/{id}', [CommentsController::class, 'delete'])->name('comment.delete')
                                                                     ->middleware(AuthorizedMiddleware::class. ':Comentarios.deleContent');


?>
