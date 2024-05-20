<?php

use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthorizedMiddleware;


Route::get('/roles', [RolesController::class, 'index'])
    ->name('roles.index')
    ->middleware(AuthorizedMiddleware::class. ':Roles.showContent');

Route::get('/roles/create', [RolesController::class, 'create'])
    ->name('roles.create')
    ->middleware(AuthorizedMiddleware::class.':Roles.createContent');

Route::get('/roles/edit/{id}', [RolesController::class, 'edit'])
    ->name('roles.edit')
    ->middleware(AuthorizedMiddleware::class.':Roles.updateContent');

Route::post('/roles/store', [RolesController::class, 'store'])
    ->name('roles.store')                                                              
    ->middleware(AuthorizedMiddleware::class.':Roles.createContent');

Route::put('/roles/update', [RolesController::class, 'update'])
    ->name('roles.update')
    ->middleware(AuthorizedMiddleware::class.':Roles.updateContent');

Route::delete('/roles/delete/{id}', [RolesController::class, 'delete'])
    ->name('roles.delete')
  ->middleware(AuthorizedMiddleware::class.':Roles.deleContent');


?>
