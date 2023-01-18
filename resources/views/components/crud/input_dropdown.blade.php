@props([
    'title',
    'name',
    'options' => [],
    'selected' => '',
])

<div>
    <div class="relative">
        <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-white font-bold text-lg">{{ $title }}</label>
        <select id="{{ $name }}" name="{{ $name }}" class="bg-gray-700 border border-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
            <option selected>Choose a {{ $name }}</option>
            @foreach($options as $option)
                @if($option->id == $selected)
                    <option value="{{ $option->id }}" selected>{{ $option->name }}</option>
                @else
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>