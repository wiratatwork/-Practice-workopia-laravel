<x-layout>
    <x-slot:title>All Jobs</x-slot:title>

    <div class="container mx-auto px-4 py-8">
        <div class="hero-overlay mb-8 rounded-xl overflow-hidden">
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($jobs as $job)
                <x-job-card :job="$job" />
                @empty
                <div class="col-span-full text-center py-12 text-gray-500">
                    No jobs available at the moment.
                </div>
                @endforelse
        </div>
    </div>
</x-layout>

