# Plan: Flash Messages & Alpine.js Interactivity

## Goal
Implement a global notification system using Laravel's Flash Sessions and Alpine.js for automatic dismissal, enhancing the user experience across all pages.

## Steps

### 1. Configure Alpine.js
- Edit `resources/views/layout.blade.php`.
- Add the Alpine.js CDN script in the `<head>` section to enable reactive UI components.

### 2. Create Alert Component
- Execute `php artisan make:component Alert`.
- Edit `resources/views/components/alert.blade.php`:
    - Define props: `@props(['type' => 'success', 'message' => ''])`.
    - Implement a wrapper `div` using Alpine.js:
        - `x-data="{ show: true }"`: Initialize visibility.
        - `x-init="setTimeout(() => show = false, 5000)"`: Auto-dismiss after 5 seconds.
        - `x-show="show"`: Toggle visibility.
        - `x-transition`: Add a smooth fade-out effect.
    - Apply dynamic Tailwind classes based on the `type` (e.g., green for `success`, red for `error`).
    - Display the `message` and a close button to manually dismiss the alert.

### 3. Integrate Alert into Global Layout
- Edit `resources/views/layout.blade.php`.
- Place the `<x-alert>` component above the `{{ $slot }}`.
- Pass the session data to the component:
    - Check for `session('success')` $\rightarrow$ `<x-alert type="success" :message="session('success')" />`.
    - Check for `session('error')` $\rightarrow$ `<x-alert type="error" :message="session('error')" />`.

### 4. Update Controller Flash Messages
- Verify that `JobController` methods already use `->with('success', '...')`.
- (Optional) Add error flash messages if any validation or operation fails.

## Verification
- Create a job listing $\rightarrow$ Verify a green success alert appears and disappears after 5 seconds.
- Update a job $\rightarrow$ Verify the success alert appears.
- Delete a job $\rightarrow$ Verify the success alert appears.
- Verify that the alerts are positioned correctly and look modern.
