<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

// Index
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

// Create 
Route::get('/jobs/create', function () {
    return view('Jobs.create');
});

// Show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('Jobs.show', ['job' => $job]);
});

// Store
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

//Edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('Jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);
    // authorize

    //findOrFail(): to mitigate against searching for a job that doesn't exist
    //Will throw a model not found exception
    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    return redirect('/jobs/' . $job->id);
});

// Destroy
Route::delete('/jobs/{id}', function ($id) {
    //authorize
});

Route::get('/contact', function () {
    return view('contact');
});