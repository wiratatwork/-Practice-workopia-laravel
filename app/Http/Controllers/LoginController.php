<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // Stub for authentication logic
        return response()->json(['message' => 'Authentication successful (stub)']);
    }
}
