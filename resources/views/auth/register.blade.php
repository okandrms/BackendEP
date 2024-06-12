<x-layout>

<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full md:w-8/12">
            <div class="bg-white shadow-md rounded-lg">
                <div class="bg-gray-200 text-lg font-bold p-4">{{ __('Register') }}</div>

                <div class="p-4">
                    <form method="POST" action="{{ route('auth.show') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>

                            <input id="name" type="text" class="form-input mt-1 block w-full @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-input mt-1 block w-full @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-input mt-1 block w-full @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="form-input mt-1 block w-full" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</x-layout>
