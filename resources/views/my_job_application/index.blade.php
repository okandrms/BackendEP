<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Job Applications' => '#']" />

    @if (session('jobDeleted'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Error:</strong>
            <span class="block sm:inline">{{ session('jobDeleted') }}</span>
        </div>
    @endif

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success:</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @forelse ($applications as $application)
        @if ($application->job && !$application->job->trashed())
            <x-job-card :job="$application->job" class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <div class="flex items-center justify-between text-sm text-gray-600">
                        <div class="flex flex-col">
                            <div class="text-xs text-indigo-500 mb-1">
                                Applied {{ $application->created_at->diffForHumans() }}
                            </div>
                            <div class="text-xs text-indigo-500 mb-1">
                                Other {{ Str::plural('applicant', $application->job->job_applications_count - 1) }}
                                {{ $application->job->job_applications_count - 1 }}
                            </div>
                            <div class="text-xs text-indigo-500 mb-1">
                                Your asking salary ${{ number_format($application->expected_salary) }}
                            </div>
                            <div class="text-xs text-indigo-500">
                                Average asking salary:
                                ${{ number_format($application->job->job_applications_avg_expected_salary) }}
                            </div>
                        </div>
                        <div class="flex items-center">
                            <form action="{{ route('my_job_applications.destroy', $application) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="sr-only">Delete</button>
                                <button type="submit" class="text-indigo-500 hover:text-indigo-600 cursor-pointer transition duration-300 transform hover:scale-110">
                                    <i class="fas fa-trash-alt fa-2x"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </x-job-card>
        @endif
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No job application yet
            </div>
            <div class="text-center">
                Go find some jobs <a class="text-indigo-500 hover:underline" href="{{ route('jobs.index') }}">here!</a>
            </div>
        </div>
    @endforelse
</x-layout>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
