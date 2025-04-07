<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;

Route::get('/mail', function () {
   $job = Job::first();
    TranslateJob::dispatch($job);

    return 'Done';
});

Route::view('/', 'home', [
    'greeting' => 'Welcome Home!'
]);
Route::view('/contact', 'contact');

Route::controller(JobController::class)->group(function () {
     Route::get('/jobs', 'index');
     Route::get('/jobs/create', 'create')->middleware('auth');
     Route::get('/jobs/{job}', 'show');
     Route::post('/jobs', 'store')->middleware('auth');
     Route::get('/jobs/{job}/edit', 'edit')
        ->middleware('auth')
        // This was for a gate on our app service provider.
        // ->can('edit-job', 'job');
        // This is for a policy on our Job model (JobPolicy.php).
        ->can('edit', 'job');
    
     Route::patch('/jobs/{job}', 'update')
        ->middleware('auth')
        ->can('edit', 'job');

     Route::delete('/jobs/{job}', 'destroy')
        ->middleware('auth')
        ->can('edit-job', 'job');
 });

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

Route::post('/logout', [SessionController::class, 'destroy']);
