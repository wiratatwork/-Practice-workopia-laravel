<x-layout>
    <x-slot:title>Job Details</x-slot:title>

    <div class="max-w-2xl mx-auto p-6 bg-white shadow-sm rounded-lg border">
        <div class="flex justify-between items-start mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $job->title }}</h1>
            <span class="text-xl font-semibold text-green-600">${{ number_format($job->salary) }}</span>
        </div>

        <div class="mb-6">
            <h2 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-2">Description</h2>
            <p class="text-gray-700 leading-relaxed">{{ $job->description }}</p>
        </div>
        
        <div class="border-t pt-6 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold text-xs">
                    {{ substr($job->user->name, 0, 1) }}
                </div>
                <p class="text-sm text-gray-500">Posted by <span class="font-semibold text-gray-800">{{ $job->user->name }}</span></p>
            </div>
            <a href="/jobs" class="text-sm text-blue-500 hover:underline">&larr; Back to All Jobs</a>
        </div>
    </div>
</x-layout>
