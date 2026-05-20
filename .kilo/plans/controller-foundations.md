# Plan: Controller Foundations Exercise

## Goal
Move routing logic from `routes/web.php` to a dedicated `JobController` to follow the MVC pattern and implement standard naming conventions.

## Steps

### 1. Create JobController
- Execute `php artisan make:controller JobController` to generate the controller class.

### 2. Implement Controller Logic
- Edit `app/Http/Controllers/JobController.php`:
    - Import `Illuminate\View\View`.
    - Create `index()` method:
        - Define a sample array of jobs.
        - Return `view('jobs.index', compact('jobs'))` with `View` return type hint.
    - Create `show($id)` method:
        - Return a string `"Showing job " . $id`.

### 3. Update Routing
- Edit `routes/web.php`:
    - Import `App\Http\Controllers\JobController`.
    - Replace the `/all-jobs` closure route with `Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');`.
    - Replace the `/listings/{id}` closure route with `Route::get('/jobs/{id}', [JobController::class, 'show']);`.

## Verification
- Access `/jobs` to ensure the listings page still works via the controller.
- Access `/jobs/{id}` (e.g., `/jobs/1`) to verify the `show` method works.
