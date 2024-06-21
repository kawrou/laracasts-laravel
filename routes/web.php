<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    //eager loading to solve n+1 problem
    //Paginate so that not all the data is displayed at once
    // $jobs = Job::with('employer')->paginate(6);
    $jobs = Job::with('employer')->latest()->simplePaginate(6);
    // $jobs = Job::with('employer')->cursorPaginate(3);  

    //Lazy loading
    // $jobs = Job::all();  

    return view('Jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('Jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('Jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});