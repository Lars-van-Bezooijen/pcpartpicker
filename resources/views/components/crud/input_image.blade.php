@props([
    'title',
    'name',
])

<div>
    <div class="relative">
        <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-white font-bold text-lg" for="avatar">{{ $title }}</label>
        <div class="relative mb-5">
            <input class=" mb-2 block w-full text-sm text-gray-400 border border-gray-600 rounded-lg cursor-pointer bg-gray-700  focus:outline-none placeholder-gray-400" id="{{ $name }}" name="{{ $name }}" type="file">
            <p class="text-white text-sm">JPEG, JPG, PNG or SVG (MAX. 512x512)</p>
        </div> 
    </div>
</div>