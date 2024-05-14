<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CommentsController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/users', UserController::class);

Route::get('\user\{id}',[UserController::class, 'show']);

Route::get('/home', function () {
    return view('home/home');
});


//----------------------------------Articles--------------------------------------------------------

include('web/article.php');

//------------------------Blogs-----------------------------------------------------------------------

include('web/blog.php');

//--------------------------Comments-------------------------------------------------------------------

include('web/comment.php');
