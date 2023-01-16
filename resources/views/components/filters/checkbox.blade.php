@props(['filter_title' => '',
    'filter_name' => '',    
    'foreach_var' => [],
])

 {{-- Checkbox filter --}}
 <div class="form-control pb-4 mb-4 border-b border-white">
    <p class="font-bold">{{ $filter_title }}</p>
    <div>
        <div class="flex items-center">
            @if(request()->$filter_name)
                <input name="{{ $filter_name }}[]" id="{{ $filter_name }}_all" type="checkbox" value="all" class="w-4 h-4 text-blue-600 bg-gray-700 border-gray-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2" @if(in_array('all', request()->$filter_name)) checked @endif>
            @else
                <input name="{{ $filter_name }}[]" id="{{ $filter_name }}_all" type="checkbox" value="all" class="w-4 h-4 text-blue-600 bg-gray-700 border-gray-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2" @if(!request()->$filter_name) checked @endif>
            @endif
            <label for="{{ $filter_name }}_all" class="ml-2 font-medium text-white">All</label>
        </div>

        <div id="{{ $filter_name }}_items">
            @foreach($foreach_var as $item)
                <div class="flex items-center">
                    @if(request()->$filter_name)
                        <input name="{{ $filter_name }}[]" id="{{ $filter_name }}_{{ $item->id }}" type="checkbox" value="{{ $item->id }}" class="w-4 h-4 text-blue-600 bg-gray-700 border-gray-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2" @if(in_array($item->id, request()->$filter_name)) checked @endif>
                    @else
                        <input name="{{ $filter_name }}[]" id="{{ $filter_name }}_{{ $item->id }}" type="checkbox" value="{{ $item->id }}" class="w-4 h-4 text-blue-600 bg-gray-700 border-gray-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2">
                    @endif
                    <label for="{{ $filter_name }}_{{ $item->id }}" class="ml-2 font-medium text-white">{{ $item->name }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>