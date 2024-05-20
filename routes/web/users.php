<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthorizedMiddleware;


Route::resource('/users', UserController::class);

Route::get('\user\{id}',[UserController::class, 'show'])->name('admin')->middleware(AuthorizedMiddleware::class);


?>
