<x-layout>
    <x-slot:title>All Jobs</x-slot:title>

    <div class="hero-overlay mb-8">
        <div class="hero-content">
            <h1 class="text-4xl font-bold mb-2">Find Your Dream Job</h1>
            <p class="text-lg">Explore the best opportunities in the tech industry</p>
        </div>
    </div>

    <div class="flex gap-4 mb-6">
        <x-button-link url="/jobs/create">
            Create New Job (Default)
        </x-button-link>

        <x-button-link 
            url="/jobs/create" 
            bgClass="bg-red-500" 
            hoverClass="hover:bg-red-600" 
            icon="fa-plus"
            class="mt-4"
        >
            Add Job (Custom)
        </x-button-link>
    </div>

    <ul>
        @forelse($jobs as $job)
            <li>
                @if($loop->first)
                    <strong>[New!]</strong> 
                @endif
                {{ $job->title }}
            </li>
            @empty
            <li>No jobs available</li>
            @endforelse
        </ul>
</x-layout>
