# Plan: Eloquent Relationships (User & Job)

## Goal
Establish a one-to-many relationship between `User` and `Job` models, update the database schema to support this relationship, and implement Route Model Binding in the controller.

## Steps

### 1. Define Relationships in Models
- **Update `app/Models/Job.php`**:
    - Import `Illuminate\Database\Eloquent\Relations\BelongsTo`.
    - Add `user()` method returning `BelongsTo` (linking to `User` model).
    - Add `user_id` to the `$fillable` array.
- **Update `app/Models/User.php`**:
    - Import `Illuminate\Database\Eloquent\Relations\HasMany`.
    - Add `jobListings()` method returning `HasMany` (linking to `Job` model).

### 2. Update Database Schema
- Edit the original migration file `database/migrations/2026_05_21_064117_create_job_listings_table.php`:
    - Add `$table->foreignId('user_id')->constrained()->onDelete('cascade');` before `timestamps()`.
- Execute `php artisan migrate:fresh` to rebuild the database with the updated schema (Note: this will clear existing sample data).

### 3. Implement Route Model Binding
- Edit `app/Http/Controllers/JobController.php`:
    - Change the `show` method signature to `public function show(Job $job)`.
    - Update the method body to return `view('jobs.show', compact('job'))`.

### 4. Create Detail View
- Create `resources/views/jobs/show.blade.php` to display the job details and the owner's name using the relationship (e.g., `{{ $job->user->name }}`).

## Verification
- Run `php artisan migrate:fresh` and verify no errors.
- Re-insert sample data (including `user_id`) via Tinker.
- Access `/jobs/{id}` and verify that the job details and owner's name are displayed correctly.
