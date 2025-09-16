<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
   
});


Route::get(uri: '/job', action: [JobController::class, 'index']);