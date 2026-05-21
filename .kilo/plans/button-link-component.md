# Plan: Button Link Component Exercise

## Goal
Create a highly customizable `ButtonLink` component that supports dynamic styling via props, attribute merging, and optional icons.

## Steps

### 1. Generate ButtonLink Component
- Execute `php artisan make:component ButtonLink` to create the component class and view.

### 2. Implement ButtonLink Component View
- Edit `resources/views/components/button-link.blade.php`:
    - Define props using `@props`:
        - `url` (default: `/`)
        - `bgClass` (default: `bg-blue-500`)
        - `hoverClass` (default: `hover:bg-blue-600`)
        - `icon` (default: `null`)
    - Create an `<a>` tag with `href="{{ $url }}"`.
    - Apply classes: `px-4 py-2 rounded text-white transition-colors` (base) + `{{ $bgClass }} {{ $hoverClass }}` + `{{ $attributes->merge(['class' => '']) }}`.
    - Implement the optional icon: `@if($icon) <i class="fas {{ $icon }} mr-2"></i> @endif`.
    - Use `{{ $slot }}` for the link text.

### 3. Setup FontAwesome
- Edit `resources/views/layout.blade.php`:
    - Add the FontAwesome CDN link in the `<head>` section to ensure icons are rendered correctly.

### 4. Implement Usage Examples
- Update `resources/views/jobs/index.blade.php` to demonstrate the component:
    - **Default Button**: `<x-button-link href="/jobs/create">Create New Job</x-button-link>`
    - **Customized Button**: `<x-button-link url="/jobs/create" bgClass="bg-red-500" hoverClass="hover:bg-red-600" icon="fa-plus">Add Job</x-button-link>` (and perhaps adding a custom class like `mt-4`).

## Verification
- Navigate to `/jobs` and verify:
    - The default button has blue styling.
    - The customized button has red styling and displays a FontAwesome icon.
    - Both buttons are correctly styled as buttons (padding, rounded corners).
    - Both links navigate to the correct destination.
