# Plan: Assets Management (Tailwind & Vite) Exercise

## Goal
Configure asset management using Vite for compiled assets and the `asset()` helper for static files, and implement custom styling.

## Steps

### 1. Tailwind CSS & Vite Verification
- Note: The project already has Tailwind CSS v4 installed and integrated via `@vite` in `layout.blade.php`.
- I will ensure `resources/css/app.css` contains the necessary `@import 'tailwindcss';` (already present).
- Since v4 uses a CSS-first approach, a separate `tailwind.config.js` might not be required, but I will verify if any specific configuration is needed for the exercise.

### 2. Static Asset Integration
- Create necessary directories in `public/`: `public/js`, `public/images`, and `public/css`.
- Create a dummy JavaScript file at `public/js/script.js` (e.g., `console.log('Static JS loaded');`).
- Add a placeholder image at `public/images/logo.png` (will create a dummy file or use a placeholder URL if actual image upload is not possible, but for this exercise, I'll create an empty file to represent it).
- Update `resources/views/layout.blade.php`:
    - Add `<script src="{{ asset('js/script.js') }}"></script>` before the closing `</body>` tag.
    - Add an `<img>` tag in the navbar (via `partials/navbar.blade.php`) using `{{ asset('images/logo.png') }}`.

### 3. Custom Styling Implementation
- Create `public/css/style.css`.
- Implement a `.hero-overlay` class in `style.css` (e.g., a background image with a semi-transparent dark overlay).
- Update `resources/views/layout.blade.php`:
    - Add `<link rel="stylesheet" href="{{ asset('css/style.css') }}">` in the `<head>`.
- Update `resources/views/jobs/index.blade.php`:
    - Add a Hero section at the top using the `.hero-overlay` class to demonstrate the custom styling.

## Verification
- Access `/jobs` and verify:
    - The page loads without errors.
    - The logo image is referenced correctly (even if it's a dummy).
    - The custom Hero section with the overlay is visible.
    - Open browser console to verify "Static JS loaded" message.
    - Tailwind styles are still active.
