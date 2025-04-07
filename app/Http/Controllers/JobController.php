<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Employer;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobPosted;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(12);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        $employers = Employer::all();
        return view('jobs.create', [
            'employers' => $employers
        ]);
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job
        ]);
    }
    
    public function edit(Job $job)
    {

        // Manually authorize the user
        // Gate::authorize('edit-job', $job);

        $employers = Employer::all();

        return view('jobs.edit', [
            'job' => $job,
            'employers' => $employers
        ]); 
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
            'employer_id' => ['required']
        ]);
    
       $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => request('employer_id')
        ]);
        
        Mail::to($job->employer->user)->queue(new JobPosted($job));
    
        return redirect('/jobs');
    }

    public function update(Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
            'employer_id' => ['required']
        ]);
    
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => request('employer_id')
        ]);
    
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/jobs');
    }
}