<?php

use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::controller(JobsController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::get('/jobs/{job}', 'show');
    Route::post('/jobs', 'store');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::patch('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}', 'destroy');
});


//Can use Route:view when returning a static page or just a view
Route::view('/contact', 'contact');