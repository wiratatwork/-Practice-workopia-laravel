<nav>
    <x-nav-link url="/jobs" :active="request()->is('jobs')">All Jobs</x-nav-link> | 
    <x-nav-link url="/jobs/create" :active="request()->is('jobs/create')">Create Job</x-nav-link>
</nav>
<hr>
