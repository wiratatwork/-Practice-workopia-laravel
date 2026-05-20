# Plan: Implement Route Parameters and Constraints in Laravel

The goal is to practice using dynamic route parameters and constraints in the Laravel application `workopia` by adding specific routes to `routes/web.php`.

## Tasks

1.  **Dynamic Parameter with Constraint**: Create a GET route for `/listings/{id}` that returns "Listing ID: [id]" and only accepts numeric IDs.
2.  **Multiple Parameters**: Create a GET route for `/category/{category}/post/{post_id}` that returns "Category: [category] | Post ID: [post_id]".

## Implementation Steps

1.  **Inspect `routes/web.php`**: Read the existing content to determine the best insertion point.
2.  **Add Routes**:
    - Add the listing route:
      ```php
      Route::get('/listings/{id}', function (string $id) {
          return 'Listing ID: ' . $id;
      })->whereNumber('id');
      ```
    - Add the category/post route:
      ```php
      Route::get('/category/{category}/post/{post_id}', function (string $category, string $post_id) {
          return 'Category: ' . $category . ' | Post ID: ' . $post_id;
      });
      ```
3.  **Verification**: (Optional) Ensure the syntax is correct.

## Definition of Done
- `/listings/{id}` returns "Listing ID: [id]" for numbers and 404 for non-numbers.
- `/category/{category}/post/{post_id}` returns the expected string with both parameters.
