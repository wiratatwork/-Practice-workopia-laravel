# Plan: Job Card Component and Grid System

## Goal
Create a reusable `JobCard` component to display job listings in a responsive grid layout, implementing data formatting and conditional styling.

## Steps

### 1. Generate JobCard Component
- Execute `php artisan make:component JobCard`.

### 2. Implement JobCard UI and Logic
- Edit `resources/views/components/job-card.blade.php`:
    - Define props: `@props(['job'])`.
    - Use a card-like container (e.g., `div` with `border`, `rounded-lg`, `p-4`, `shadow-sm`).
    - Display the job title as a link to the detail page: `<a href="/jobs/{{ $job->id }}" ...>`.
    - Format the description using `Str::limit($job->description, 100)`.
    - Format the salary using `number_format($job->salary)`.
    - Implement a "Remote/On-site" badge:
        - Since the `job_listings` table doesn't have a `is_remote` column yet, I will first add a migration to include it (Boolean, default false).
        - Use `@if($job->is_remote)` to display a green badge (`bg-green-500`) for Remote and a red badge (`bg-red-500`) for On-site.

### 3. Database Update (is_remote column)
- Create migration: `php artisan make:migration add_is_remote_to_job_listings_table`.
- Add `$table->boolean('is_remote')->default(false);`.
- Run `php artisan migrate`.
- Update `App\Models\Job`'s `$fillable` array to include `is_remote`.
- (Optional) Update `JobFactory` to randomly assign `is_remote` values.

### 4. Implement Responsive Grid in Index View
- Edit `resources/views/jobs/index.blade.php`:
    - Remove the current `<ul>` list.
    - Implement a wrapper `div` with Tailwind grid classes: `grid grid-cols-1 md:grid-cols-3 gap-4`.
    - Loop through `$jobs` using `@forelse` and render the component: `<x-job-card :job="$job" />`.

## Verification
- Navigate to `/jobs` and verify the grid layout (1 col on mobile, 3 cols on desktop).
- Verify that the job cards display correctly formatted salaries and limited descriptions.
- Verify that the Remote/On-site badges appear with the correct colors.
- Click a card and verify it navigates to the correct detail page.
