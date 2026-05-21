<nav class="flex items-center justify-between px-6 py-4 bg-white border-b border-gray-100">
    <div class="flex items-center">
        <a href="/" class="text-2xl font-extrabold tracking-tight text-blue-600">
            Workopia<span class="text-yellow-500">.</span>
        </a>
    </div>

    <!-- Hamburger Button (Visible only on mobile) -->
    <button id="hamburger" class="block md:hidden p-2 text-gray-600 hover:text-blue-600 transition-colors focus:outline-none">
        <i class="fa-solid fa-bars text-xl"></i>
    </button>

    <!-- Navigation Links -->
    <div id="mobile-menu" class="hidden absolute top-16 right-4 p-4 bg-white border border-gray-100 rounded-2xl shadow-xl z-50 md:static md:flex md:items-center md:gap-2 md:border-none md:shadow-none md:bg-transparent">
        <x-nav-link url="/jobs" :active="request()->is('jobs')">All Jobs</x-nav-link>
        <x-nav-link url="/jobs/create" :active="request()->is('jobs/create')">Create Job</x-nav-link>
    </div>
</nav>

