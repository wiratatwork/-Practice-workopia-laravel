# Plan: Job Factories and Faker Exercise (Updated)

## Goal
Implement a `JobFactory` to generate realistic mock data for the `Job` model, update the database schema to include salary, and improve the UI of the index and show pages.

## Steps

### 1. Database Schema Update (Salary Column)
- Create a new migration: `php artisan make:migration add_salary_to_job_listings_table`.
- In the `up()` method, add `$table->integer('salary')->nullable();`.
- Run `php artisan migrate`.

### 2. Model Update
- Edit `app/Models/Job.php` to add `salary` to the `$fillable` array to allow mass assignment.

### 3. Generate and Configure JobFactory
- Execute `php artisan make:factory JobFactory`.
- Edit `database/factories/JobFactory.php`:
    - `user_id` $\rightarrow$ `User::factory()`
    - `title` $\rightarrow$ `$this->faker->jobTitle()`
    - `description` $\rightarrow$ `$this->faker->paragraphs(2, true)`
    - `salary` $\rightarrow$ `$this->faker->numberBetween(40000, 120000)`

### 4. Generate Mock Data
- Use a Seeder or Tinker to execute: `App\Models\Job::factory()->count(10)->create();`.

### 5. UI Updates (Simple & Clean)
- **Update `resources/views/jobs/index.blade.php`**:
    - Improve the job list styling (e.g., use a simple grid or better list items with borders).
    - Display the salary next to the job title (e.g., `{{ $job->title }} - ${{ number_format($job->salary) }}`).
- **Update `resources/views/jobs/show.blade.php`**:
    - Add a "Salary" field to the details section.
    - Refine the layout for a cleaner, more professional look using basic Tailwind utilities.

## Verification
- Navigate to `/jobs` and verify that 10 new jobs with realistic titles, descriptions, and salaries are displayed.
- Access `/jobs/{id}` and verify the salary is displayed correctly.
- Verify that the new styles make the page look cleaner without being overly complex.
