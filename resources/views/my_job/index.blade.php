<x-layout>
  <div class="flex justify-between items-center mb-4">
    <x-breadcrumbs :links="['My Jobs' => '#']" />
    
    <div>
      <a href="{{ route('my-jobs.create') }}" class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 text-white rounded-full w-12 h-12 transition duration-300 transform hover:scale-110">
        <i class="fas fa-plus"></i>
      </a>
    </div>
  </div>

  @if (session('success'))
    <div class="mb-4 text-green-500">
      {{ session('success') }}
    </div>
  @endif

  @forelse ($jobs as $job)
    <x-job-card :job="$job">
      <div class="text-xs text-slate-500">
        @forelse ($job->jobApplications as $application)
          <div class="mb-4 flex items-center justify-between">
            <div class="text-indigo-500">
              <div>{{ $application->user->name }}</div>
              <div class="text-indigo-500">
                Applied {{ $application->created_at->diffForHumans() }}
              </div>
              <div class="text-indigo-500">
                <a href="{{ route('applications.downloadCv', $application) }}" class="text-indigo-500 hover:underline">
                  Download CV
                </a>
              </div>
            </div>

            <div class="text-indigo-500">${{ number_format($application->expected_salary) }}</div>
          </div>
        @empty
          <div class="text-indigo-500">No applications yet</div>
        @endforelse

        <div class="mt-4 flex space-x-4">
          <div class="flex items-center text-indigo-500 hover:text-indigo-600 cursor-pointer transition duration-300 transform hover:scale-110">
            <a href="{{ route('my-jobs.edit', $job) }}">
              <i class="fas fa-edit fa-2x"></i>
            </a>
          </div>
          <div class="flex items-center">
            <form action="{{ route('my-jobs.destroy', $job) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-indigo-500 hover:text-indigo-600 cursor-pointer transition duration-300 transform hover:scale-110">
                <i class="fas fa-trash-alt fa-2x"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </x-job-card>
  @empty
    <div class="rounded-md border border-dashed border-slate-300 p-8">
      <div class="text-center font-medium">
        No jobs yet
      </div>
      <div class="text-center">
         Post your first job <a class="text-indigo-500 hover:underline"
          href="{{ route('my-jobs.create') }}">here!</a>
      </div>
    </div>
  @endforelse
</x-layout>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
