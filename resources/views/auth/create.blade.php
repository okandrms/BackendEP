<x-layout>
    <h1 class="my-16 text-center text-4xl font-semibold text-indigo-700">
        Sign in to your account
    </h1>

    @if (session('status'))
        <div class="mb-4 text-center text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <x-card class="py-8 px-12 bg-white border border-gray-200 rounded-lg shadow-md">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <x-label for="email" :required="true" class="text-gray-700">E-mail</x-label>
                <x-text-input name="email" class="mt-2 rounded-md" />
            </div>

            <div class="mb-6">
                <x-label for="password" :required="true" class="text-gray-700">Password</x-label>
                <x-text-input name="password" type="password" class="mt-2 rounded-md" />
            </div>

            <div class="mb-6 flex items-center justify-between text-sm text-gray-700">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" id="remember"
                        class="rounded-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                    <label for="remember">Remember me</label>
                </div>
                <div>
                    <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline">Forgot password?</a>
                </div>
            </div>

            <x-button class="w-full bg-gradient-to-r from-indigo-400 to-purple-500 text-white font-semibold rounded-full shadow-md hover:bg-gradient-to-br hover:from-indigo-500 hover:to-purple-600 hover:text-gray-100 transition-all duration-200">
                Login
            </x-button>
        </form>
    </x-card>
</x-layout>


