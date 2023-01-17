@props(['filter_title' => '', 
    'filter_name' => '', 
])

{{-- Radio filter --}}
<div class="form-control pb-4 mb-4 border-b border-white">
    <p class="font-bold">{{ $filter_title }}</p>
    <div>
        <input type="radio" name="{{ $filter_name }}" value="all" id="{{ $filter_name }}_all" @if(request()->$filter_name == 'all' || !isset(request()->$filter_name) ) checked @endif>
        <label for="{{ $filter_name }}_all">All</label>
    </div>
    <div>
        <input type="radio" name="{{ $filter_name }}" value="yes" id="{{ $filter_name }}_yes" @if(request()->$filter_name == 'yes') checked @endif>
        <label for="{{ $filter_name }}_yes">Yes</label>
    </div>
    <div>
        <input type="radio" name="{{ $filter_name }}" value="no" id="{{ $filter_name }}_no" @if(request()->$filter_name == 'no') checked @endif>
        <label for="{{ $filter_name }}_no">No</label>
    </div>
</div>

