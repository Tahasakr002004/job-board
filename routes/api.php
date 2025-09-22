<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rest_Api\v1\PostApiController;
use App\Http\Controllers\Rest_Api\v1\AuthController;
// use App\Http\Controllers\TagController;





//  Route::post(uri: '/blog', action: [PostController::class, 'createPosts']);
//  Route::delete(uri: '/blog/{id}', action: [PostController::class, 'deletePosts']);

//  Route::post(uri: '/comments', action: [CommentController::class, 'createComment']);

//  Route::post(uri: '/tags', action: [TagController::class, 'createTags']);


//Post /v1/auth/login
//Post /v1/auth/refresh
//GET /v1/auth/me
//GET /v1/auth/logout





Route::prefix("v1")->group(function () {
  Route::apiResource("posts", PostApiController::class)->middleware("auth:api");
  Route::prefix("auth")->group(function () {
    Route::post("login", [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function () {
      Route::post('refresh', [AuthController::class,'refresh']);
      Route::get('me', [AuthController::class,'me']);
      Route::post('logout', [AuthController::class,'logout']);
    });
  });
}); 