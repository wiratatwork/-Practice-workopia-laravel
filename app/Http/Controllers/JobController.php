<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $jobs = ['Laravel Developer', 'Frontend Engineer', 'UI/UX Designer', 'Product Manager'];
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): string
    {
        return "Showing job " . $id;
    }
}
