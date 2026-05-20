# Plan: Blade Basic and Data Passing Exercise

## Goal
Implement a basic Blade template exercise to practice directory structure, data passing using `compact()`, and Blade directives like `@forelse` and the `$loop` object.

## Steps

### 1. View Structure Setup
- Create the directory `resources/views/jobs`.
- Create the file `resources/views/jobs/index.blade.php`.

### 2. Implement Blade Template
- In `resources/views/jobs/index.blade.php`, implement the following:
    - Use an unordered list `<ul>`.
    - Use `@forelse($jobs as $job)` to iterate through the jobs.
    - Check `@if($loop->first)` to display `<strong>[New!]</strong>` for the first item.
    - Display the job name `{{ $job }}`.
    - Use `@empty` to display `<li>No jobs available</li>`.
    - Close with `@endforelse`.

### 3. Route Configuration
- Modify `routes/web.php` to add a new route (e.g., `/jobs`).
- Inside the route closure:
    - Define an array `$jobs` with some sample job titles (e.g., 'Laravel Developer', 'Frontend Engineer', 'UI/UX Designer').
    - Return the view `jobs.index` passing the data using `compact('jobs')`.

## Verification
- Access the `/jobs` URL in the browser to verify the list is displayed correctly with the "[New!]" tag on the first item.
- Test the `@empty` case by temporarily passing an empty array.
