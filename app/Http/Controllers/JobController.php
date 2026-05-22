<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Job;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        if ($request->is('/')) {
            $jobs = Job::latest()->limit(6)->get();
        } else {
            $jobs = Job::all();
        }
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|numeric',
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|max:2048',
            'is_remote' => 'boolean',
        ]);

        $validated['is_remote'] = $request->has('is_remote');
        
        if ($request->hasFile('company_logo')) {
            $validated['company_logo'] = $request->file('company_logo')->store('logos', 'public');
        }

        // For now, we'll use the first user as owner since we are not authenticated
        $user = \App\Models\User::first();
        $validated['user_id'] = $user->id;

        Job::create($validated);

        return redirect('/jobs')->with('success', 'Job posted successfully!');
    }

    public function edit(Job $job): View
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|numeric',
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|max:2048',
            'is_remote' => 'boolean',
        ]);

        $validated['is_remote'] = $request->has('is_remote');

        if ($request->hasFile('company_logo')) {
            if ($job->company_logo) {
                Storage::disk('public')->delete($job->company_logo);
            }
            $validated['company_logo'] = $request->file('company_logo')->store('logos', 'public');
        }

        $job->update($validated);

        return redirect('/jobs')->with('success', 'Job updated successfully!');
    }

    public function destroy(Job $job)
    {
        if ($job->company_logo) {
            Storage::disk('public')->delete($job->company_logo);
        }
        $job->delete();

        return redirect('/jobs')->with('success', 'Job deleted successfully!');
    }

    public function show(Job $job): View
    {
        return view('jobs.show', compact('job'));
    }
}
