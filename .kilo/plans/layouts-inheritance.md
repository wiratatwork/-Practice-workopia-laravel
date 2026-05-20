# Plan: Layouts & Inheritance Exercise

## Goal
Implement a master layout and partials system to reduce code duplication across the application using Blade's `@extends`, `@section`, `@yield`, and `@include`.

## Steps

### 1. Create Partials
- Create the directory `resources/views/partials`.
- Create the file `resources/views/partials/navbar.blade.php` containing a simple navigation bar with links to:
    - Job Listings (`/jobs`)
    - Create Job (`/jobs/create`)

### 2. Create Main Layout
- Create the file `resources/views/layout.blade.php`.
- Implement a standard HTML5 boilerplate.
- Include `@yield('title', 'Workopia')` in the `<title>` tag.
- Include `@include('partials.navbar')` at the top of the `<body>`.
- Include `@yield('content')` as the main content area.

### 3. Apply Inheritance to Views
- **Update `resources/views/jobs/index.blade.php`**:
    - Add `@extends('layout')` at the top.
    - Wrap the existing `<ul>` content within `@section('content')` and `@endsection`.
    - Add `@section('title', 'All Jobs')`.
- **Update `resources/views/jobs/create.blade.php`**:
    - Add `@extends('layout')` at the top.
    - Wrap the existing `<form>` content within `@section('content')` and `@endsection`.
    - Add `@section('title', 'Create Job')`.

## Verification
- Navigate to `/jobs` and verify it is rendered within the main layout with the navbar and correct title.
- Navigate to `/jobs/create` and verify it is rendered within the main layout with the navbar and correct title.
- Verify that the navbar links work correctly.
