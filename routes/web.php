<?php

use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', [JobsController::class, 'index']);
Route::get('/jobs/create', [JobsController::class, 'create']);
Route::get('/jobs/{job}', [JobsController::class, 'show']);
Route::post('/jobs', [JobsController::class, 'store']);
Route::get('/jobs/{job}/edit', [JobsController::class, 'edit']);
Route::patch('/jobs/{job}', [JobsController::class, 'update']);
Route::delete('/jobs/{job}', [JobsController::class, 'destroy']);

Route::get('/contact', function () {
    return view('contact');
});