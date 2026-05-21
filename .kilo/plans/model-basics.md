# Plan: Model Basics Exercise

## Goal
Create a `Job` model, link it to the `job_listings` table, and update the controller and view to fetch and display data from the database using Eloquent.

## Steps

### 1. Create Job Model
- Execute `php artisan make:model Job` to create the model class.

### 2. Configure Model Table
- Edit `app/Models/Job.php`:
    - Add `protected $table = 'job_listings';` to specify the custom table name.

### 3. Update Controller to use Eloquent
- Edit `app/Http/Controllers/JobController.php`:
    - Import `App\Models\Job`.
    - In the `index()` method:
        - Replace the hard-coded `$jobs` array with `$jobs = Job::all();`.
        - Ensure the data is passed to the view using `compact('jobs')`.

### 4. Update View for Object Syntax
- Edit `resources/views/jobs/index.blade.php`:
    - Change the output from `{{ $job }}` (which worked for strings) to `{{ $job->title }}` (to access the `title` property of the `Job` model object).

## Verification
- Since the database is currently empty, the page should display "No jobs available" (via `@empty`).
- To verify data fetching, I will manually insert a few sample records into the `job_listings` table using `php artisan tinker`.
- Access `/jobs` and verify that the inserted jobs are displayed correctly.
