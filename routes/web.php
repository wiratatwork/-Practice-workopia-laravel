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

Route::get('/listings/{id}', function (string $id) {
    return 'Listing ID: ' . $id;
})->whereNumber('id');

Route::get('/category/{category}/post/{post_id}', function (string $category, string $post_id) {
    return 'Category: ' . $category . ' | Post ID: ' . $post_id;
});
