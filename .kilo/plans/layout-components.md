# Plan: Layout Components and Slots Exercise

## Goal
Migrate from Template Inheritance (`@yield`, `@extends`, `@section`) to a more modern Blade Component-based layout system using `<x-layout>`, `{{ $slot }}`, and named slots.

## Steps

### 1. Generate and Configure Layout Component
- Execute `php artisan make:component Layout` to generate the component class and view.
- Move `resources/views/components/layout.blade.php` to `resources/views/layout.blade.php`.
- Edit `app/View/Components/Layout.php` and update the `render()` method to return `view('layout')`.

### 2. Implement Layout Component View
- Edit `resources/views/layout.blade.php`:
    - Use a standard HTML5 boilerplate.
    - Replace the title with `{{ $title ?? 'Workopia | Find and List Jobs' }}`.
    - Keep `@include('partials.navbar')`.
    - Replace the content area with `{{ $slot }}`.

### 3. Refactor Child Views to use Component
- **Update `resources/views/jobs/index.blade.php`**:
    - Remove `@extends('layout')`, `@section('title', ...)`, and `@section('content')`/`@endsection`.
    - Wrap the content in `<x-layout>` tags.
    - Add `<x-slot:title>All Jobs</x-slot:title>` inside the component.
- **Update `resources/views/jobs/create.blade.php`**:
    - Remove `@extends('layout')`, `@section('title', ...)`, and `@section('content')`/`@endsection`.
    - Wrap the content in `<x-layout>` tags.
    - Add `<x-slot:title>Create Job</x-slot:title>` inside the component.

## Verification
- Access `/jobs` to verify the page renders correctly using the component layout and displays the title "All Jobs".
- Access `/jobs/create` to verify the page renders correctly using the component layout and displays the title "Create Job".
- Verify that the default title "Workopia | Find and List Jobs" appears if no title slot is provided (can be tested by creating a temporary page).
