<x-layout>
    <x-slot:title>Register</x-slot:title>

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-md mx-auto bg-white p-8 md:p-10 rounded-3xl shadow-xl border border-gray-100">
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Create Account</h1>
                <p class="text-gray-500">Join us and start your journey today.</p>
            </div>
            
            <form action="{{ route('register.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <x-inputs.text 
                        id="name" 
                        name="name" 
                        label="Full Name" 
                        placeholder="John Doe" 
                        required
                    />
                    <x-inputs.text 
                        id="email" 
                        name="email" 
                        type="email" 
                        label="Email Address" 
                        placeholder="email@example.com" 
                        required
                    />
                    <x-inputs.text 
                        id="password" 
                        name="password" 
                        type="password" 
                        label="Password" 
                        placeholder="********" 
                        required
                    />
                </div>
                
                <div class="flex items-center justify-center pt-4">
                    <x-button type="primary" class="w-full">
                        Register
                    </x-button>
                </div>
            </form>
            
            <div class="mt-8 text-center">
                <p class="text-gray-500">
                    Already have an account? <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Login here</a>
                </p>
            </div>
        </div>
    </div>
</x-layout>
