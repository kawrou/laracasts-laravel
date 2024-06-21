<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    //eager loading to solve n+1 problem
    //Paginate so that not all the data is displayed at once
    $jobs = Job::with('employer')->paginate(3);  
    // $jobs = Job::with('employer')->simplePaginate(3);  
    // $jobs = Job::with('employer')->cursorPaginate(3);  
   
    //Lazy loading
    // $jobs = Job::all();  

    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});