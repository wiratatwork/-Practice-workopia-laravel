<x-layout>
    <x-slot:title>Job Details</x-slot:title>

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-2xl mx-auto bg-white p-8 md:p-10 rounded-3xl shadow-xl border border-gray-100">
            <div class="flex justify-between items-start mb-8">
                <div class="flex items-center gap-4">
                    @if($job->company_logo)
                        <img src="{{ asset('storage/' . $job->company_logo) }}" alt="{{ $job->company_name }} Logo" class="w-16 h-16 rounded-xl object-cover shadow-sm">
                    @else
                        <div class="w-16 h-16 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400 font-bold">
                            {{ substr($job->company_name, 0, 1) }}
                        </div>
                    @endif
                    <div>
                        <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">{{ $job->title }}</h1>
                        <p class="text-blue-600 font-semibold">{{ $job->company_name }}</p>
                    </div>
                </div>
                <form action="/jobs/{{ $job->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?')" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex items-center gap-2 text-gray-400 hover:text-red-500 transition-colors text-sm font-medium">
                        <i class="fa-solid fa-trash-can"></i>
                        <span class="hidden sm:inline">Delete Job</span>
                    </button>
                </form>
            </div>

            <div class="flex items-center gap-3 mb-8">
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
                <span class="text-gray-300">|</span>
                <span class="text-sm font-bold text-gray-700">
                    ${{ number_format($job->salary) }} <span class="font-normal text-gray-500">/ year</span>
                </span>
            </div>

            <div class="mb-10">
                <h2 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Description</h2>
                <p class="text-gray-600 leading-relaxed text-lg">
                    {{ $job->description }}
                </p>
            </div>

            <div class="border-t border-gray-100 pt-8 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold text-sm">
                        {{ strtoupper(substr($job->user->name, 0, 1)) }}
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[10px] uppercase tracking-wider text-gray-400 font-bold">Posted by</span>
                        <span class="text-sm font-semibold text-gray-800">{{ $job->user->name }}</span>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <a href="/jobs/{{ $job->id }}/edit" class="px-5 py-2 text-sm font-semibold text-blue-600 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors">
                        Edit Listing
                    </a>
                    <a href="/jobs" class="px-5 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>



