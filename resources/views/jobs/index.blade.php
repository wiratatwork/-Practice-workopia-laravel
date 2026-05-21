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

    <div class="grid grid-cols-1 gap-4">
        @forelse($jobs as $job)
            <div class="p-4 border rounded-lg hover:bg-gray-50 transition-colors flex justify-between items-center">
                <div>
                    <div class="flex items-center gap-2">
                        @if($loop->first)
                            <span class="text-xs font-bold bg-yellow-400 text-yellow-900 px-2 py-0.5 rounded-full uppercase">Featured</span>
                        @endif
                        <a href="/jobs/{{ $job->id }}" class="text-lg font-semibold text-blue-600 hover:underline">
                            {{ $job->title }}
                        </a>
                    </div>
                    <p class="text-gray-500 text-sm">${{ number_format($job->salary) }} / year</p>
                </div>
                <a href="/jobs/{{ $job->id }}" class="text-sm text-gray-400 hover:text-blue-500">View Details &rarr;</a>
            </div>
            @empty
            <div class="text-center py-12 text-gray-500">
                No jobs available at the moment.
            </div>
            @endforelse
    </div>
</x-layout>
