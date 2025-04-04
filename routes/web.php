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

Route::get('/jobs/{id}/edit', function ($id) {
    $employers = Employer::all();

    return view('jobs.edit', [
        'job' => Job::find($id),
        'employers' => $employers
    ]);
});

Route::post('/jobs', function () {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
        'employer_id' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => request('employer_id')
    ]);

    return redirect('/jobs');
}); 

Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
        'employer_id' => ['required']
    ]);

    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => request('employer_id')
    ]);

    return redirect('/jobs/' . $job->id);
});

Route::delete('/jobs/{id}', function ($id) {
    Job::findOrFail($id)->delete();

    return redirect('/jobs');
});


Route::get('/contact', function () {
    return view('contact');
});
