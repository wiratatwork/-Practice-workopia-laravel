# Plan: Homepage Jobs Display (Updated)

## Goal
Update the application so that the home page (`/`) displays the 6 latest job listings by reusing the `JobController@index` logic and the `JobCard` component.

## Steps

### 1. Update Routing
- Edit `routes/web.php`:
    - Update the root route `/` to point to `[JobController::class, 'index']`.
    - Remove the old root route that returned the `welcome` view.

### 2. Update JobController Logic
- Edit `app/Http/Controllers/JobController.php`:
    - Modify the `index()` method to handle different behaviors based on the request path.
    - If the request is for the root path (`/`), fetch only the 6 latest jobs: `Job::latest()->limit(6)->get()`.
    - If the request is for `/jobs`, fetch all jobs: `Job::all()`.
    - Pass the fetched `$jobs` to the view.

### 3. Refactor Views
- **Home Page (`welcome.blade.php` or new `index.blade.php`)**:
    - Since the route now points to `JobController@index`, it will return `view('jobs.index')` by default.
    - I will update `resources/views/jobs/index.blade.php` to be generic enough to work for both the home page and the jobs listing page.
    - (Optional) If a distinct home page design is needed, I will create `resources/views/jobs/home.blade.php` and update the controller to return it when the path is `/`.

### 4. Verification
- Access `/` and verify that only 6 latest jobs are displayed.
- Access `/jobs` and verify that all jobs are displayed.
- Verify that the `JobCard` component renders correctly in both cases.
