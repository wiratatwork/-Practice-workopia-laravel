# Plan: CRUD and Form Components Implementation

## Goal
Implement a full CRUD (Create, Read, Update, Delete) system for job listings using reusable input components, Route Model Binding, and secure request handling.

## Steps

### 1. Create Reusable Input Components
- Create directory `resources/views/components/inputs`.
- **Text Input Component (`resources/views/components/inputs/text.blade.php`)**:
    - Props: `id`, `name`, `label`, `placeholder`, `value`.
    - Implement a label and an `<input type="text">`.
    - Use `old($name, $value)` for the `value` attribute to preserve input on validation failure.
- **Textarea Component (`resources/views/components/inputs/textarea.blade.php`)**:
    - Props: `id`, `name`, `label`, `placeholder`, `value`.
    - Implement a label and a `<textarea>`.
    - Use `old($name, $value)` for the content.

### 2. Refactor Create and Edit Forms
- **Create View (`resources/views/jobs/create.blade.php`)**:
    - Replace raw HTML inputs with `<x-inputs.text>` and `<x-inputs.textarea>`.
- **Edit View (`resources/views/jobs/edit.blade.php`)**:
    - Create this file (if not exists).
    - Use `<x-layout>` and `<x-slot:title>Edit Job</x-slot:title>`.
    - Implement a form with `method="POST"` and `@method('PUT')`.
    - Use `<x-inputs.text>` and `<x-inputs.textarea>`, passing the existing `$job` data as the `value` prop.

### 3. Implement Controller Logic (Update & Destroy)
- Edit `app/Http/Controllers/JobController.php`:
    - **Update Method**:
        - Change signature to `public function update(Request $request, Job $job)`.
        - Validate incoming data.
        - Call `$job->update($validatedData)`.
        - Redirect to `/jobs` with a success message.
    - **Destroy Method**:
        - Change signature to `public function destroy(Job $job)`.
        - Call `$job->delete()`.
        - Redirect to `/jobs` with a success message.

### 4. Implement Delete Confirmation
- Update the `JobCard` component or the `show` page to include a Delete button.
- The button must be inside a form with `@csrf` and `@method('DELETE')`.
- Add `onsubmit="return confirm('Are you sure you want to delete this job?')"` to the form.

### 5. Final Polish and Verification
- Test the full CRUD cycle:
    - Create a job $\rightarrow$ View in list $\rightarrow$ Edit job $\rightarrow$ View updated info $\rightarrow$ Delete job.
- Verify that validation errors (if any) maintain input values via `old()`.
- Ensure Route Model Binding correctly handles 404s for non-existent IDs.
