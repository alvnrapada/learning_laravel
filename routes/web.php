<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Welcome Home!'
    ]);
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->simplePaginate(4);

    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    return view('job', [
        'job' => Job::find($id)
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});
