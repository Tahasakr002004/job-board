<?php


use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;

Route::get(uri:'/', action:IndexController::class);
Route::get(uri:'/about', action:AboutController::class);
Route::get(uri:'/contact', action:ContactController::class);

Route::get(uri: '/job', action: [JobController::class, 'index']);



Route::resource('blog', PostController::class);
Route::resource('comment', CommentController::class);
Route::resource('tags', TagController::class);
