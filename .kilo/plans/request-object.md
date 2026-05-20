# Plan: Implement Request Object and Query Params in Laravel

The goal is to practice using the `Request` object to handle metadata, filter query parameters, and provide default values in the Laravel application `workopia`.

## Tasks

1.  **User Info Route**: Create a GET route for `/user-info` that returns the user's IP address and browser agent as JSON.
2.  **Search Route**: Create a GET route for `/search` that returns only the `keyword` and `location` query parameters as JSON.
3.  **Check User Route**: Create a GET route for `/check-user` that returns a welcome message using the `name` query parameter, defaulting to "Guest".

## Implementation Steps

1.  **Inspect `routes/web.php`**: Check for the `Illuminate\Http\Request` import.
2.  **Add Import**: Ensure `use Illuminate\Http\Request;` is present at the top of `routes/web.php`.
3.  **Add Routes**:
    - **`/user-info`**:
      ```php
      Route::get('/user-info', function (Request $request) {
          return [
              'ip_address' => $request->ip(),
              'browser_info' => $request->userAgent()
          ];
      });
      ```
    - **`/search`**:
      ```php
      Route::get('/search', function (Request $request) {
          return $request->only(['keyword', 'location']);
      });
      ```
    - **`/check-user`**:
      ```php
      Route::get('/check-user', function (Request $request) {
          $name = $request->input('name', 'Guest');
          return "Welcome, " . $name;
      });
      ```

## Definition of Done
- `/user-info` returns IP and User Agent.
- `/search` returns only `keyword` and `location` from query string.
- `/check-user` returns "Welcome, [name]" or "Welcome, Guest".
- `Request` class is correctly imported.
