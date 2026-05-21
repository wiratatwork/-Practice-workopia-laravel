# Plan: Creating Custom Migrations (job_listings)

## Goal
Create and implement a custom database migration for the `job_listings` table with specific columns for job titles and descriptions.

## Steps

### 1. Create Migration File
- Execute `php artisan make:migration create_job_listings_table` to generate the migration blueprint.

### 2. Define Schema in Migration
- Edit the newly created migration file in `database/migrations/`.
- In the `up()` method, inside `Schema::create('job_listings', ...)`, add the following columns:
    - `$table->string('title');`
    - `$table->text('description');`
- Ensure `$table->id()` and `$table->timestamps()` remain.

### 3. Execute Migration
- Run `php artisan migrate` to apply the changes to the PostgreSQL database.

## Verification
- Verify the command output to ensure the migration ran successfully.
- (User Action) Verify the table structure in PgAdmin (Columns: id, title, description, created_at, updated_at).
