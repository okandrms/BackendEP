<div>
    <label for="{{ $name }}-all" class="mb-1 flex items-center">
        <input type="radio" id="{{ $name }}-all" name="{{ $name }}" value=""
               class="form-radio text-indigo-600 border-2 border-gray-300 focus:ring-indigo-500 h-4 w-4"
               @checked(!request($name)) />
        <span class="ml-2 text-sm text-gray-700">All</span>
    </label>

    @foreach ($optionsWithLabels as $label => $option)
        <label for="{{ $name }}-{{ $loop->index }}" class="mb-1 flex items-center">
            <input type="radio" id="{{ $name }}-{{ $loop->index }}" name="{{ $name }}" value="{{ $option }}"
                   class="form-radio text-indigo-600 border-2 border-gray-300 focus:ring-indigo-500 h-4 w-4"
                   @checked($option === ($value ?? request($name))) />
            <span class="ml-2 text-sm text-gray-700">{{ $label }}</span>
        </label>
    @endforeach

    @error($name)
        <div class="mt-1 text-xs text-red-500">
            {{ $message }}
        </div>
    @enderror
</div>
