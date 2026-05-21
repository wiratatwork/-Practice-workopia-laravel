<x-layout>
    <x-slot:title>All Jobs</x-slot:title>

    <div class="container mx-auto px-4 py-8">
        <div class="hero-overlay mb-12 rounded-3xl overflow-hidden shadow-2xl">
            <div class="hero-content">
                <h1 class="text-4xl md:text-6xl font-extrabold mb-4 tracking-tight">
                    Find Your <span class="text-yellow-400">Dream Job</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto leading-relaxed">
                    Explore the best opportunities in the tech industry and take the next step in your career.
                </p>
            </div>
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


