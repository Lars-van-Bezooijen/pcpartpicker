@props([
    'title',
    'name',
])

<div>
    <div class="relative">
        <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-white font-bold text-lg">{{ $title }}</label>
        <input type="text" id="{{ $name }}" name="{{ $name }}" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400" placeholder="">
    </div>
</div>