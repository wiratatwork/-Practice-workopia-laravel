<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return '<h1>Contact Us</h1>';
});

Route::get('/all-jobs', function () {
    return 'Available Jobs';
})->name('jobs.index');

Route::get('/test-link', function () {
    $url = route('jobs.index');
    return "<a href='$url'>Click here to see all jobs</a>";
});
