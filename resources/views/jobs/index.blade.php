<x-layout>
    <x-slot:title>All Jobs</x-slot:title>

    <ul>
        @forelse($jobs as $job)
            <li>
                @if($loop->first)
                    <strong>[New!]</strong> 
                @endif
                {{ $job }}
            </li>
            @empty
            <li>No jobs available</li>
            @endforelse
        </ul>
</x-layout>
