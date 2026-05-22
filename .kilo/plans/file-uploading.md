# Plan: File Uploading & Storage Implementation

## Goal
Implement functionality to upload, update, and delete company logos for job listings, including database schema updates, storage management, and UI integration.

## Steps

### 1. Database Schema Update
- Create a migration to add company fields: `php artisan make:migration add_company_fields_to_job_listings_table --table=job_listings`.
- In the migration `up()` method, add:
    - `$table->string('company_name');`
    - `$table->string('company_logo')->nullable();`
- In the `down()` method, add `$table->dropColumn(['company_name', 'company_logo']);`.
- Run `php artisan migrate`.

### 2. Model Update
- Update `app/Models/Job.php` by adding `company_name` and `company_logo` to the `$fillable` array.

### 3. Storage Configuration
- Execute `php artisan storage:link` to make uploaded files accessible via the `public` disk.

### 4. Controller Logic Updates
- **Store Method (`JobController@store`)**:
    - Add `company_name` to validation.
    - Check for `company_logo` file using `$request->hasFile('company_logo')`.
    - Store the file in the `logos` directory on the `public` disk: `$request->file('company_logo')->store('logos', 'public')`.
    - Save the resulting path in the database.
- **Update Method (`JobController@update`)**:
    - Add `company_name` to validation.
    - If a new logo is uploaded:
        - Delete the old logo file using `Storage::disk('public')->delete($job->company_logo)`.
        - Store the new logo and update the path.
- **Destroy Method (`JobController@destroy`)**:
    - Before deleting the record, check for and delete the associated logo file using `Storage::disk('public')->delete($job->company_logo)`.

### 5. UI Integration
- **Create and Edit Views**:
    - Add `enctype="multipart/form-data"` to the `<form>` tags.
    - Add a new `x-inputs.text` for `company_name`.
    - Add a file input for `company_logo`. I'll create a new simple component or use raw HTML for the file input.
- **Show View**:
    - Display the company name.
    - Display the company logo using `asset('storage/' . $job->company_logo)` if it exists, otherwise show a default placeholder.

## Verification
- Create a job with a logo and verify it appears in the list and detail page.
- Edit the logo and verify the old file is deleted from `storage/app/public/logos` and the new one is saved.
- Delete a job and verify the associated logo file is removed from storage.
- Verify the `enctype` is working by checking that the file reaches the controller.
