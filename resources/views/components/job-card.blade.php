@props(['job'])

<div class="group relative bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ease-in-out flex flex-col h-full">
    <div class="flex justify-between items-start mb-4">
        <div class="flex-1">
            <a href="/jobs/{{ $job->id }}" class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-200 block leading-tight">
                {{ $job->title }}
            </a>
        </div>
        <div class="ml-2">
            @if($job->is_remote)
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>
                    Remote
                </span>
            @else
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                    <span class="w-1.5 h-1.5 rounded-full bg-gray-500 mr-1.5"></span>
                    On-site
                </span>
            @endif
        </div>
    </div>
    
    <p class="text-gray-500 text-sm mb-6 line-clamp-3 leading-relaxed">
        {{ Str::limit($job->description, 120) }}
    </p>
    
    <div class="mt-auto pt-4 border-t border-gray-50 flex items-center justify-between">
        <div class="flex flex-col">
            <span class="text-[10px] uppercase tracking-wider text-gray-400 font-bold">Estimated Salary</span>
            <span class="text-lg font-bold text-gray-900">
                ${{ number_format($job->salary) }}<span class="text-xs font-normal text-gray-500">/year</span>
            </span>
        </div>
        <div class="flex items-center gap-4">
            <form action="/jobs/{{ $job->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors" title="Delete Job">
                    <i class="fa-solid fa-trash-can text-sm"></i>
                </button>
            </form>
            <a href="/jobs/{{ $job->id }}" class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors">
                Details 
                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</div>
