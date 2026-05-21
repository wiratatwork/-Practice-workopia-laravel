<nav class="flex items-center gap-4 mb-2">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 w-auto">
    <x-nav-link url="/jobs" :active="request()->is('jobs')">All Jobs</x-nav-link> | 
    <x-nav-link url="/jobs/create" :active="request()->is('jobs/create')">Create Job</x-nav-link>
</nav>
<hr class="mb-4">
