<x-layout>
    <x-slot:title>Edit Job</x-slot:title>

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-2xl mx-auto bg-white p-8 md:p-10 rounded-3xl shadow-xl border border-gray-100">
            <div class="mb-8 text-center md:text-left">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Edit Job Listing</h1>
                <p class="text-gray-500">Update the details of your job posting to attract the right candidates.</p>
            </div>
            
            <form action="/jobs/{{ $job->id }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 gap-6">
                    <x-inputs.text 
                        id="title" 
                        name="title" 
                        label="Job Title" 
                        value="{{ $job->title }}" 
                        placeholder="e.g. Senior Laravel Developer" 
                        required
                    />

                    <x-inputs.textarea 
                        id="description" 
                        name="description" 
                        label="Job Description" 
                        value="{{ $job->description }}" 
                        placeholder="Describe the role and requirements..." 
                        required
                    />

                    <x-inputs.number 
                        id="salary" 
                        name="salary" 
                        label="Annual Salary" 
                        value="{{ $job->salary }}" 
                        placeholder="e.g. 70000" 
                        required
                    />
                </div>

                <div class="flex items-center p-4 bg-gray-50 rounded-xl border border-gray-200">
                    <div class="flex items-center h-5">
                        <input type="checkbox" name="is_remote" id="is_remote" value="1" {{ $job->is_remote ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 cursor-pointer">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="is_remote" class="font-medium text-gray-700 cursor-pointer select-none">
                            This is a remote position
                        </label>
                        <p class="text-gray-500 text-xs">Allow candidates from anywhere in the world to apply.</p>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 pt-4">
                    <a href="/jobs" class="px-6 py-2.5 text-sm font-semibold text-gray-600 hover:text-gray-900 transition-colors">
                        Cancel
                    </a>
                    <x-button type="primary">
                        Update Job
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-layout>

