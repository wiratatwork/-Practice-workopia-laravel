<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Stub for storing registration data
        return response()->json(['message' => 'Registration successful (stub)']);
    }
}
