<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


//##HERE IS PUBLIC Routes
Route::get('/', IndexController::class);
Route::get('/contact', ContactController::class);
Route::get('/job', [JobController::class, 'index']);




///Authentication
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/', [AuthController::class, 'logout'])->name('logout');




//##HERE IS PROTECTED  Routes
Route::middleware('auth')->group(function () {
    Route::resource('blog', PostController::class);
    Route::resource('tags', TagController::class);
    Route::resource('blog/{post}/comments', CommentController::class)->shallow()->only([
        'store', 'edit', 'update', 'destroy'
    ]);
});

Route::middleware('OnlyMe')->group(function () {
    Route::get('/about', AboutController::class);
});