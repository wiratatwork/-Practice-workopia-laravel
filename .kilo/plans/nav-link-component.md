# Plan: Reusable NavLink Component Exercise

## Goal
Create a reusable `NavLink` component that highlights the active menu item based on the current request URL.

## Steps

### 1. Generate NavLink Component
- Execute `php artisan make:component NavLink` to create the component class and view.

### 2. Implement NavLink Component View
- Edit `resources/views/components/nav-link.blade.php`:
    - Define props using `@props(['url' => '/', 'active' => false])`.
    - Create an `<a>` tag with `href="{{ $url }}"`.
    - Apply conditional classes based on the `$active` prop:
        - If `true`: `text-yellow-500 font-bold`
        - If `false`: `text-blue-600` (or a standard color)
    - Use `{{ $slot }}` for the link text.

### 3. Update Navigation Bar
- Edit `resources/views/partials/navbar.blade.php`:
    - Replace standard `<a>` tags with `<x-nav-link>` components.
    - Pass the `url` prop.
    - Pass the `active` prop using a PHP expression: `:active="request()->is('jobs*')"` for jobs and `:active="request()->is('/')"` for home.

## Verification
- Navigate to `/jobs` and verify the "All Jobs" link is highlighted.
- Navigate to `/jobs/create` and verify the "Create Job" link is highlighted.
- Verify that the links correctly navigate to their respective pages.
