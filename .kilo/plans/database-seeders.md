# Plan: Automated Database Seeders

## Goal
Create a comprehensive seeding system that clears old data and populates the database with realistic predefined job listings and random users.

## Steps

### 1. Prepare Predefined Data
- Create the directory `database/seeders/data`.
- Create the file `database/seeders/data/job_listings.php` containing an array of job data (e.g., `title`, `description`, `salary`).

### 2. Implement JobSeeder
- Execute `php artisan make:seeder JobSeeder`.
- Edit `database/seeders/JobSeeder.php`:
    - Import `Illuminate\Support\Facades\DB` and `App\Models\User`.
    - In `run()`:
        - Load the array from `database_path('seeders/data/job_listings.php')`.
        - Fetch all existing user IDs using `User::pluck('id')->toArray()`.
        - Iterate through the job data and assign a random `user_id` from the list.
        - Add `created_at` and `updated_at` timestamps.
        - Perform a bulk insert using `DB::table('job_listings')->insert($jobs)`.

### 3. Configure DatabaseSeeder
- Edit `database/seeders/DatabaseSeeder.php`:
    - Implement a "truncate" logic to prevent duplicate data:
        - Truncate `job_listings` first (child table).
        - Truncate `users` second (parent table).
        - *Note: Use `DB::statement('TRUNCATE TABLE job_listings, users CASCADE');` for PostgreSQL to handle foreign keys.*
    - Create 10 random users using `User::factory(10)->create();`.
    - Call the `JobSeeder` using `$this->call(JobSeeder::class);`.

### 4. Verification
- Execute `php artisan db:seed`.
- Verify in the browser (`/jobs`) that the predefined jobs are displayed and associated with the newly created random users.
- Check PgAdmin to ensure the table counts are correct.
