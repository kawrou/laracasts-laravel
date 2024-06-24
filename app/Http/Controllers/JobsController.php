<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
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
    }

    public function create()
    {
        return view('Jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);

        return redirect('/jobs');
    }

    public function show(Job $job)
    {
        return view('Jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {
        return view('Jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
}
