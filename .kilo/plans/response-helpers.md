# Plan: Implement Response Helpers and File Handling in Laravel

The goal is to practice controlling server responses and file downloads in the Laravel application `workopia` by adding specific routes to `routes/web.php`.

## Tasks

1.  **Custom Status & Header Route**: Create a GET route for `/secret` that returns "Access Denied" with a 403 Forbidden status and `text/plain` content type.
2.  **JSON Response Route**: Create a GET route for `/api/jobs` that returns a JSON list of job positions.
3.  **File Download Route**: Create a GET route for `/get-favicon` that forces a download of the `favicon.ico` file from the public directory.

## Implementation Steps

1.  **Inspect `routes/web.php`**: Read the existing content to find the insertion point.
2.  **Add Routes**:
    - **`/secret`**:
      ```php
      Route::get('/secret', function () {
          return response('Access Denied', 403)
              ->header('Content-Type', 'text/plain');
      });
      ```
    - **`/api/jobs`**:
      ```php
      Route::get('/api/jobs', function () {
          return response()->json([
              ['title' => 'Laravel Developer', 'salary' => '50,000'],
              ['title' => 'Backend Engineer', 'salary' => '60,000']
          ]);
      });
      ```
    - **`/get-favicon`**:
      ```php
      Route::get('/get-favicon', function () {
          return response()->download(public_path('favicon.ico'));
      });
      ```

## Definition of Done
- `/secret` returns 403 status and `text/plain` content.
- `/api/jobs` returns the specified JSON array.
- `/get-favicon` triggers a download of `public/favicon.ico`.
