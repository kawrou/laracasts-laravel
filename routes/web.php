<?php

use App\Http\Controllers\SessionController; 
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;

//Can use Route:view when returning a static page or just a view
Route::view('/', 'home');
Route::view('/contact', 'contact');

// You can group all of your routes using Route::controller() and pass
// the controller as arg
// Route::controller(JobsController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });

//Or you can use Route::resource(); 
//Registers all of the routes for a typical resourceful controller
//You'll still need to follow the conventions of:
//[index, create, show, store, edit, update, destroy]
//in your controller, otherwise it'll throw an error
Route::resource('jobs', JobsController::class, [
    // 'only'  => ['edit'], 
    // 'except'=> ['edit'], 
]);

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class,'create']);    
Route::post('/login', [SessionController::class,'store']);    