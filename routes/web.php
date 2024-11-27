<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;


Route::get('/', function () {
    return view('home', [
        'greeting' => 'Hello',
        'name' => 'Pernilla'
    ]);
});

Route::get('/jobs', function (){
    return view('jobs', [
        'jobs' => Job::all()
        ]
    );
});

// Give me the job that is equal to the id that was passed in
Route::get('/jobs/{id}', function ($id){
    // search for the job with the matching id
    $job = Job::find($id);
            // dd($job); // jobs/3
    return view('job', ['job' => $job]);

});

Route::get('/contact', function () {
    return view('contact');
});
