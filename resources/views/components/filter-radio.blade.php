@props(['filter_title' => '', 
    'filter_name' => '', 
])

<div class="form-control pb-4 mb-4 border-b border-white">
    <p class="font-bold">{{ $filter_title }}</p>
    <div>
        <input type="radio" name="{{ $filter_name }}" value="all" id="{{ $filter_name }}_all" @if(request()->$filter_name == 'all' || !isset(request()->$filter_name) ) checked @endif>
        <label for="{{ $filter_name }}_all">All</label>
    </div>
    <div>
        <input type="radio" name="{{ $filter_name }}" value="1" id="{{ $filter_name }}_yes" @if(request()->$filter_name == '1') checked @endif>
        <label for="{{ $filter_name }}_yes">Yes</label>
    </div>
    <div>
        <input type="radio" name="{{ $filter_name }}" value="0" id="{{ $filter_name }}_no" @if(request()->$filter_name == '0') checked @endif>
        <label for="{{ $filter_name }}_no">No</label>
    </div>
</div>

