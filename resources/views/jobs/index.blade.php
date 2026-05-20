@extends('layout')

@section('title', 'All Jobs')

@section('content')
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
@endsection
