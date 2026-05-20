<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/user-info', function (Request $request) {
    return [
        'ip_address' => $request->ip(),
        'browser_info' => $request->userAgent()
    ];
});

Route::get('/search', function (Request $request) {
    return $request->only(['keyword', 'location']);
});

Route::get('/check-user', function (Request $request) {
    $name = $request->input('name', 'Guest');
    return "Welcome, " . $name;
});
