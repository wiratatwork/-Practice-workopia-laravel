# Plan: Resource Controllers Exercise

## Goal
Implement a Resource Controller for jobs to automate the creation of CRUD routes and controller methods.

## Steps

### 1. Generate Resource Controller
- Remove the existing `app/Http/Controllers/JobController.php` to avoid conflicts.
- Execute `php artisan make:controller JobController --resource` to generate a controller with all 7 standard CRUD methods.

### 2. Resource Routing
- Edit `routes/web.php`:
    - Remove the existing manual routes for `/jobs` and `/jobs/{id}`.
    - Add `Route::resource('jobs', JobController::class);`.

### 3. Inspection
- Execute `php artisan route:list` to verify that all 7 resource routes are correctly mapped to the `JobController` methods.

## Verification
- Check the output of `route:list` for the following routes:
    - `GET /jobs` -> `index`
    - `GET /jobs/create` -> `create`
    - `POST /jobs` -> `store`
    - `GET /jobs/{job}` -> `show`
    - `GET /jobs/{job}/edit` -> `edit`
    - `PUT/PATCH /jobs/{job}` -> `update`
    - `DELETE /jobs/{job}` -> `destroy`
