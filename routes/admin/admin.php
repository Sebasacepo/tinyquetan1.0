<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


