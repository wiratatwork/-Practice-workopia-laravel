<x-layout>
    <x-slot:title>Job Details</x-slot:title>

    <div class="p-6 bg-white shadow-sm rounded-lg">
        <h1 class="text-3xl font-bold mb-4">{{ $job->title }}</h1>
        <p class="text-gray-600 mb-6">{{ $job->description }}</p>
        
        <div class="border-t pt-4">
            <p class="text-sm text-gray-500">Posted by: 
                <span class="font-semibold text-blue-600">{{ $job->user->name }}</span>
            </p>
        </div>
        
        <div class="mt-6">
            <a href="/jobs" class="text-blue-500 hover:underline">← Back to all jobs</a>
        </div>
    </div>
</x-layout>
