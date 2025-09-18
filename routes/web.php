<?php


use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;

Route::get(uri:'/', action:[IndexController::class, 'index']);
Route::get(uri:'/about', action:[IndexController::class, 'about']);
Route::get(uri:'/contact', action:[IndexController::class, 'contact']);

Route::get(uri: '/job', action: [JobController::class, 'index']);

Route::get(uri: '/blog', action: [PostController::class, 'index']);
Route::get(uri: '/blog/create', action: [PostController::class, 'createPosts']);
Route::get(uri: '/blog/delete', action: [PostController::class, 'deletePosts']);
Route::get(uri: '/blog/{id}', action: [PostController::class, 'showPosts']);


Route::get(uri: '/comments', action: [CommentController::class, 'index']);
Route::get(uri: '/comments/create', action: [CommentController::class, 'createComment']);

Route::get(uri: '/tags', action: [TagController::class, 'index']);
Route::get(uri: '/tags/create', action: [TagController::class, 'createTags']);
Route::get(uri: '/tags/test-many', action: [TagController::class, 'testManyToMany']);
