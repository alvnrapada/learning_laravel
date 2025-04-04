<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Employer;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Welcome Home!'
    ]);
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(12);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    $employers = Employer::all();
    return view('jobs.create', [
        'employers' => $employers
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    return view('jobs.show', [
        'job' => Job::find($id)
    ]);
});

Route::post('/jobs', function () {

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => request('employer_id')
    ]);

    return redirect('/jobs');
}); 

Route::get('/contact', function () {
    return view('contact');
});
