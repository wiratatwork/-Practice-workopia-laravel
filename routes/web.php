<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\JobController;

Route::get('/', [JobController::class, 'index']);

Route::get('/contact', function () {
    return '<h1>Contact Us</h1>';
});

Route::resource('jobs', JobController::class);

Route::get('/test-link', function () {
    $url = route('jobs.index');
    return "<a href='$url'>Click here to see all jobs</a>";
});


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

Route::get('/secret', function () {
    return response('Access Denied', 403)
        ->header('Content-Type', 'text/plain');
});

Route::get('/api/jobs', function () {
    return response()->json([
        ['title' => 'Laravel Developer', 'salary' => '50,000'],
        ['title' => 'Backend Engineer', 'salary' => '60,000']
    ]);
});

Route::get('/get-favicon', function () {
    return response()->download(public_path('favicon.ico'));
});

Route::post('/submit-data', function () {
    return 'Submitted Successfully';
});
