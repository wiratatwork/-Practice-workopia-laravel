# Plan: Implement CSRF Protection and Exception in Laravel

The goal is to understand Laravel's CSRF protection by creating a POST route and then exempting it from the CSRF check.

## Tasks

1.  **Add POST Route**: Create a POST route for `/submit-data` that returns "Submitted Successfully".
2.  **Exempt from CSRF**: Update `bootstrap/app.php` to exclude `/submit-data` from CSRF token validation.

## Implementation Steps

1.  **Inspect `routes/web.php`**: Identify where to add the POST route.
2.  **Add Route**:
    - Add `Route::post('/submit-data', ...)` to `routes/web.php`.
3.  **Modify `bootstrap/app.php`**:
    - Locate the `withMiddleware` block.
    - Add the `validateCsrfTokens` configuration to exempt `/submit-data`.
    ```php
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            '/submit-data',
        ]);
    })
    ```

## Definition of Done
- A POST route exists for `/submit-data`.
- `/submit-data` is explicitly listed in the CSRF exceptions in `bootstrap/app.php`.
