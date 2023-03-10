{{-- Search filter --}}
<label for="search" class="mb-2 text-sm font-medium sr-only text-white">Search</label>
<div class="relative mb-4">
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
    </div>
    <input name="search" type="search" id="search_input" class="block w-full p-4 pl-10 text-sm border border-gray-300 rounded-lg focus:ring-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:border-blue-500" placeholder="Enter product name..." @if(request()->search) value="{{ request()->search }}" @endif)>
</div>