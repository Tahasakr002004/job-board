<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\IndexController;




Route::get(uri:'/', action:[IndexController::class, 'index']);
Route::get(uri:'/about', action:[IndexController::class, 'about']);
Route::get(uri:'/contact', action:[IndexController::class, 'contact']);
Route::get(uri: '/job', action: [JobController::class, 'index']);
