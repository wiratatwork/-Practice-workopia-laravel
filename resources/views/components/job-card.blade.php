@props(['job'])

<div class="p-4 border rounded-lg shadow-sm bg-white hover:shadow-md transition-shadow">
    <div class="flex justify-between items-start mb-2">
        <a href="/jobs/{{ $job->id }}" class="text-lg font-bold text-blue-600 hover:underline">
            {{ $job->title }}
        </a>
        @if($job->is_remote)
            <span class="text-xs font-bold bg-green-100 text-green-700 px-2 py-1 rounded">Remote</span>
        @else
            <span class="text-xs font-bold bg-red-100 text-red-700 px-2 py-1 rounded">On-site</span>
        @endif
    </div>
    
    <p class="text-gray-600 text-sm mb-4">
        {{ Str::limit($job->description, 100) }}
    </p>
    
    <div class="flex justify-between items-center border-t pt-3 mt-auto">
        <span class="text-sm font-semibold text-gray-700">
            ${{ number_format($job->salary) }}
        </span>
        <a href="/jobs/{{ $job->id }}" class="text-xs text-blue-500 hover:underline">View Details &rarr;</a>
    </div>
</div>
