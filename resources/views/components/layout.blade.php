<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Factory</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-r from-indigo-200 to-emerald-200 text-slate-700 mx-auto mt-10 max-w-2xl">
    <nav class="mb-8 flex justify-between items-center px-4 py-2 bg-gradient-to-r from-indigo-100 to-emerald-100 text-white rounded-md">
        <ul class="flex space-x-4 text-lg font-medium">
            <li>
                <a href="{{ route('jobs.index') }}" class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200">Home</a>
            </li>
        </ul>

        <ul class="flex space-x-4 text-lg font-medium">
            @auth
            <li class="hidden sm:block">
                <span class="text-sm text-gray-600">Welcome, {{ explode(' ', auth()->user()->name)[0] ?? 'Anonymous' }}</span>
            </li>
            <li>
                <a href="{{ route('my_job_applications.index') }}"
                    class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200">Applications</a>
            </li>
            <li>
                <a href="{{ route('my-jobs.index') }}" class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200">My Jobs</a>
            </li>
            <li>
                <form action="{{ route('auth.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200">Logout</button>
                </form>
            </li>
            @else
            <li>
                <a href="{{ route('auth.show') }}" class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200">Register</a>
            </li>
            <li>
                <a href="{{ route('auth.create') }}" class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200">Sign in</a>
            </li>
            @endauth
        </ul>

        <ul class="flex space-x-4 text-lg font-medium sm:hidden">
            @auth
            <li>
                <a href="{{ route('my_job_applications.index') }}"
                    class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200">Apps</a>
            </li>
            <li>
                <a href="{{ route('my-jobs.index') }}" class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200">Jobs</a>
            </li>
            <li>
                <form action="{{ route('auth.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200">Logout</button>
                </form>
            </li>
            @else
            <li>
                <a href="{{ route('auth.show') }}" class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200">Reg</a>
            </li>
            <li>
                <a href="{{ route('auth.create') }}" class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200">Sign</a>
            </li>
            @endauth
        </ul>
    </nav>

    @if (session('success'))
    <div role="alert"
        class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700">
        <p class="font-semibold">Success!</p>
        <p>{{ session('success') }}</p>
    </div>
    @endif
    @if (session('error'))
    <div role="alert"
        class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700">
        <p class="font-semibold">Error!</p>
        <p>{{ session('error') }}</p>
    </div>
    @endif

    {{ $slot }}

</body>

</html>



