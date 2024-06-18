<x-layout>
  <x-breadcrumbs :links="['My Jobs' => '#']" class="mb-4" />

  <div class="mb-8 text-right">
    <x-link-button href="{{ route('my-jobs.create') }}">Add New</x-link-button>
  </div>

  @if (session('success'))
    <div class="mb-4 text-green-500">
      {{ session('success') }}
    </div>
  @endif

  @forelse ($jobs as $job)
    <x-job-card :$job>
      <div class="text-xs text-slate-500">
        @forelse ($job->jobApplications as $application)
          <div class="mb-4 flex items-center justify-between">
            <div class="text-indigo-500">
              <div>{{ $application->user->name }}</div>
              <div class="text-indigo-500">
                Applied {{ $application->created_at->diffForHumans() }}
              </div>
              <!-- Changed Text Color to Indigo -->
              <div class="text-indigo-500">
                Download CV
              </div>
            </div>

            <div class="text-indigo-500">${{ number_format($application->expected_salary) }}</div>
          </div>
        @empty
          <div class="text-indigo-500">No applications yet</div>
          <div class="mt-4 flex space-x-2">
            <div class="flex items-center">
                <x-link-button href="{{ route('my-jobs.edit', $job) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-3 rounded-lg">
                    Edit
                </x-link-button>
            </div>
            <div class="flex items-center">
                <form action="{{ route('my-jobs.destroy', $job) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');">
                    @csrf
                    @method('DELETE')
                    <x-button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded-lg">
                        Delete
                    </x-button>
                </form>
            </div>
          </div>
        @endforelse
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
