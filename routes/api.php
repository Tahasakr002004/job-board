<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;





 Route::post(uri: '/blog', action: [PostController::class, 'createPosts']);
 Route::delete(uri: '/blog/{id}', action: [PostController::class, 'deletePosts']);

 Route::post(uri: '/comments', action: [CommentController::class, 'createComment']);

 Route::post(uri: '/tags', action: [TagController::class, 'createTags']);
