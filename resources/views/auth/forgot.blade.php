<x-layout>
    <h1 class="my-16 text-center text-4xl font-semibold text-indigo-700">
        Forgot Password
    </h1>

    <x-card class="py-8 px-12 bg-white border border-gray-200 rounded-lg shadow-md">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-6">
                <x-label for="email" :required="true" class="text-gray-700">E-mail</x-label>
                <x-text-input name="email" type="email" class="mt-2 rounded-md" required />
            </div>

            <x-button class="w-full bg-gradient-to-r from-indigo-400 to-purple-500 text-white font-semibold rounded-full shadow-md hover:bg-gradient-to-br hover:from-indigo-500 hover:to-purple-600 hover:text-gray-100 transition-all duration-200">
                Reset password
            </x-button>
        </form>

        @if (session('status'))
            <div class="mt-6 text-green-600">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mt-6 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </x-card>
</x-layout>
