<nav {{ $attributes->merge(['class' => 'py-4']) }}>
  <ul class="flex items-center space-x-4 text-gray-500 text-sm font-medium">
    <li class="hover:text-indigo-700 transition-colors duration-200">
      <a href="/" class="flex items-center space-x-1">
        <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20"><path d="M10 20l-7.5-6.5L1 12.1l9-9 9 9-1.5 1.4L10 20z"/></svg>
        <span>Home</span>
      </a>
    </li>

    @foreach ($links as $label => $link)
      <li class="text-gray-400">→</li>
      <li class="hover:text-indigo-700 transition-colors duration-200">
        <a href="{{ $link }}" class="flex items-center space-x-1">
          <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20"><path d="M10 20l-7.5-6.5L1 12.1l9-9 9 9-1.5 1.4L10 20z"/></svg>
          <span>{{ $label }}</span>
        </a>
      </li>
    @endforeach
  </ul>
</nav>
