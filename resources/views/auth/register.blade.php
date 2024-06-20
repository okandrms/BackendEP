<x-layout>
    <h1 class="my-16 text-center text-4xl font-semibold text-indigo-700">
        Create an account
    </h1>

    <x-card class="py-8 px-12 bg-white border border-gray-200 rounded-2xl shadow-md">
        <form action="{{ route('auth.create') }}" method="POST">
            @csrf
    
            <div class="mb-6">
                <x-label for="name" :required="true" class="text-gray-700">Name</x-label>
                <x-text-input name="name" class="mt-2 rounded-md" />
            </div>
    
            <div class="mb-6">
                <x-label for="email" :required="true" class="text-gray-700">E-mail</x-label>
                <x-text-input name="email" class="mt-2 rounded-md" />
            </div>
    
            <div class="mb-6">
                <x-label for="password" :required="true" class="text-gray-700">Password</x-label>
                <x-text-input name="password" type="password" class="mt-2 rounded-md" />
            </div>
    
            <div class="mb-6">
                <x-label for="password_confirmation" :required="true" class="text-gray-700">Confirm Password</x-label>
                <x-text-input name="password_confirmation" type="password" class="mt-2 rounded-md" />
            </div>
    
            <x-button class="w-full bg-gradient-to-r from-indigo-400 to-purple-500 text-white font-semibold rounded-full shadow-md hover:bg-gradient-to-br hover:from-indigo-500 hover:to-purple-600 hover:text-gray-100 transition-all duration-200">
                Register
            </x-button>
        </form>
    </x-card>
    
</x-layout>

