<x-layout>
    <x-slot:title>Create Job</x-slot:title>

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-2xl mx-auto bg-white p-8 md:p-10 rounded-3xl shadow-xl border border-gray-100">
            <div class="mb-8 text-center md:text-left">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Post a New Job</h1>
                <p class="text-gray-500">Fill in the details below to reach your next great hire.</p>
            </div>
            
            <form action="/jobs" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 gap-6">
                    <x-inputs.text 
                        id="company_name" 
                        name="company_name" 
                        label="Company Name" 
                        placeholder="e.g. Google" 
                        required
                    />

                    <div class="mb-4">
                        <label for="company_logo" class="block text-sm font-medium text-gray-700 mb-1">Company Logo</label>
                        <input type="file" name="company_logo" id="company_logo" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                        @error('company_logo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-inputs.text 
                        id="title" 
                        name="title" 
                        label="Job Title" 
                        placeholder="e.g. Senior Laravel Developer" 
                        required
                    />

                    <x-inputs.textarea 
                        id="description" 
                        name="description" 
                        label="Job Description" 
                        placeholder="Describe the role and requirements..." 
                        required
                    />

                    <x-inputs.number 
                        id="salary" 
                        name="salary" 
                        label="Annual Salary" 
                        placeholder="e.g. 70000" 
                        required
                    />
                </div>

                <div class="flex items-center p-4 bg-gray-50 rounded-xl border border-gray-200">
                    <div class="flex items-center h-5">
                        <input type="checkbox" name="is_remote" id="is_remote" value="1" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 cursor-pointer">
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
                        Post Job
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-layout>


