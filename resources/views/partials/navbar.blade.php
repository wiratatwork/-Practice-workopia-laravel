<nav class="flex items-center justify-between p-4 bg-white shadow-sm rounded-lg mb-4">
    <div class="flex items-center gap-4">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 w-auto">
        <span class="font-bold text-lg">Workopia</span>
    </div>

    <!-- Hamburger Button (Visible only on mobile) -->
    <button id="hamburger" class="block md:hidden text-2xl focus:outline-none">
        <i class="fa-solid fa-bars"></i>
    </button>

    <!-- Navigation Links -->
    <div id="mobile-menu" class="hidden absolute top-16 right-4 p-4 bg-white border rounded-lg shadow-lg z-50 md:static md:flex md:items-center md:gap-4 md:border-none md:shadow-none md:bg-transparent">
        <x-nav-link url="/jobs" :active="request()->is('jobs')">All Jobs</x-nav-link>
        <span class="hidden md:inline"> | </span>
        <x-nav-link url="/jobs/create" :active="request()->is('jobs/create')">Create Job</x-nav-link>
    </div>
</nav>
<hr class="mb-4">
