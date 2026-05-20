# Plan: Forms & Request Handling Exercise

## Goal
Implement a job creation form with CSRF protection and handle the incoming request in the `JobController` using type hinting.

## Steps

### 1. Create the Creation View
- Create the file `resources/views/jobs/create.blade.php`.
- Implement a HTML form:
    - `action="/jobs"`
    - `method="POST"`
    - Include `@csrf` directive for security.
    - Add input fields for `title` and `description`.
    - Add a submit button.

### 2. Implement Controller Logic
- Edit `app/Http/Controllers/JobController.php`:
    - Update the `create()` method:
        - Add `: View` return type hint.
        - Return `view('jobs.create')`.
    - Update the `store(Request $request)` method:
        - Add `: string` return type hint.
        - Retrieve `title` and `description` using `$request->input()`.
        - Return a confirmation string displaying the received data.

## Verification
- Navigate to `/jobs/create` to see the form.
- Submit the form and verify that the `store` method correctly receives the data and displays it.
- Test submitting without `@csrf` (by temporarily removing it) to verify the 419 Page Expired error.
