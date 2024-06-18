<x-layout>
    <x-breadcrumbs class="mb-4"
      :links="['My Job Applications' => '#']" />
  
    @forelse ($applications as $application)
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
              <div>
                  <form action="{{ route('my_job_applications.destroy', $application) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <x-button class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-1 px-3 rounded-lg mx-auto mt-4 block">
                        Cancel
                    </x-button>
                  </form>
              </div>
          </div>
      </div>
  </x-job-card>
  
    @empty
    <div class="rounded-md border border-dashed border-slate-300 p-8">
        <div class="text-center font-medium">
          No job application yet
        </div>
        <div class="text-center">
          Go find some jobs <a class="text-indigo-500 hover:underline"
            href="{{ route('jobs.index') }}">here!</a>
        </div>
      </div>
    @endforelse
  </x-layout>