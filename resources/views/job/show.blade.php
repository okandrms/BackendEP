<x-layout>
  <x-breadcrumbs class="mb-4"
    :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
  <x-job-card :$job>
    <p class="mb-4 text-sm text-slate-500">
      {!! nl2br(e($job->description)) !!}
    </p>

    @if(auth()->check())
      @can('apply', $job)
        <x-link-button :href="route('job.application.create', $job)">
          Apply
        </x-link-button>
      @else
        <div class="text-center text-sm font-medium text-indigo-500">
          You already applied to this job
        </div>
      @endcan
    @else
      <div class="text-center text-sm font-medium text-slate-500">
        <a href="{{ route('login') }}" class="text-blue-500 no-underline hover:text-blue-800 transition duration-300 ease-in-out">
          Please login, or register before applying
        </a>
      </div>
    @endif
  </x-job-card>
  
  <x-card class="mb-4 border border-gray-200 rounded-lg shadow-md overflow-hidden">
    <h2 class="mb-4 text-xl font-semibold text-indigo-700">
        More {{ $job->employer->company_name }} Jobs
    </h2>

    <div class="text-gray-600">
        @foreach ($job->employer->jobs as $otherJob)
        <div class="mb-4 flex justify-between items-center">
            <div class="flex-1">
                <div class="text-lg text-indigo-900">
                    <a href="{{ route('jobs.show', $otherJob) }}" class="hover:text-indigo-600 transition-colors duration-200">
                        {{ $otherJob->title }}
                    </a>
                </div>
                <div class="text-sm text-gray-500">
                    {{ $otherJob->created_at->diffForHumans() }}
                </div>
            </div>
            <div class="text-lg font-semibold text-indigo-700">
                ${{ number_format($otherJob->salary) }}
            </div>
        </div>
        @endforeach
    </div>
</x-card>
<x-card class="bg-gradient-to-r from-indigo-100 to-emerald-100 mb-4 border border-gray-200 rounded-lg shadow-md overflow-hidden">
  <h2 class="mb-4 text-xl font-semibold text-indigo-700">
    Compare with Other Jobs in the Same Category and Experience Level
  </h2>
  <div class="text-sm text-slate-500 mb-4">
    <div class="flex space-x-2 text-xs">
      <x-tag class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full shadow-sm hover:bg-indigo-200 hover:text-indigo-800 transition-colors duration-200">
          <a id="experience" href="{{ route('jobs.index', ['experience' => $job->experience]) }}">
              {{ Str::ucfirst($job->experience) }}
          </a>
      </x-tag>
      <x-tag class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full shadow-sm hover:bg-gray-200 hover:text-gray-900 transition-colors duration-200">
          <a id="category" href="{{ route('jobs.index', ['category' => $job->category]) }}">
              {{ $job->category }}
          </a>
      </x-tag>
  </div>
  </div>
  <x-charts>
    
  </x-charts>
</x-card>
</x-layout>