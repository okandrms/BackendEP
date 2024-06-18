<x-card class="mb-6 p-6 bg-white rounded-xl shadow-xl hover:shadow-2xl transition-shadow duration-300 border border-gray-100">
  <div class="mb-4 flex justify-between items-center">
      <h2 class="text-2xl font-bold text-gray-900">{{ $job->title }}</h2>
      <div class="text-xl font-semibold text-black">
          {{ '€' . number_format($job->salary) }}
      </div>
  </div>
  <div class="mb-4 flex items-center justify-between text-sm text-gray-600">
      <div class="flex items-center space-x-6">
          <div class="font-medium text-gray-800">{{ $job->employer->company_name }}</div>
          <div class="flex items-center space-x-2">
              <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20"><path d="M5 8a7 7 0 1110 0A7 7 0 015 8zm7 7a5 5 0 01-10 0h10z" /></svg>
              <div>{{ $job->location }}</div>
          </div>
      </div>
      <div class="flex space-x-2 text-xs">
          <x-tag class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full shadow-sm hover:bg-indigo-200 hover:text-indigo-800 transition-colors duration-200">
              <a href="{{ route('jobs.index', ['experience' => $job->experience]) }}">
                  {{ Str::ucfirst($job->experience) }}
              </a>
          </x-tag>
          <x-tag class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full shadow-sm hover:bg-gray-200 hover:text-gray-900 transition-colors duration-200">
              <a href="{{ route('jobs.index', ['category' => $job->category]) }}">
                  {{ $job->category }}
              </a>
          </x-tag>
      </div>
  </div>
  {{ $slot }}
</x-card>


