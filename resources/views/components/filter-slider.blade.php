@props(['filter_title' => '',
    'filter_min_name' => '',
    'filter_max_name' => '', 
    'lowest_number' => 0,
    'highest_number' => 100,
    'label_after' => '',
    'label_before' => ''
])

{{-- TDP filter --}}
<div class="form-control pb-2 mb-4 border-b border-white">
    <p class="font-bold">{{ $filter_title }}</p>
    <div class="mb-2">
        @if(request()->$filter_min_name && request()->$filter_max_name)
            <range-selector min-range="{{ $lowest_number }}" max-range="{{ $highest_number }}" slider-color="#384454" circle-border="3px solid #1c64f3" circle-focus-border="5px solid #1c64f3" event-name-to-emit-on-change="tdp_slider" preset-min="{{ request()->$filter_min_name }}" preset-max="{{ request()->$filter_max_name }}" label-after="{{ $label_after }}" label-before="{{ $label_before }}"/>
        @else
            <range-selector min-range="{{ $lowest_number }}" max-range="{{ $highest_number }}" slider-color="#384454" circle-border="3px solid #1c64f3" circle-focus-border="5px solid #1c64f3" event-name-to-emit-on-change="tdp_slider" label-after="{{ $label_after }}" label-before="{{ $label_before }}"/>
        @endif
    </div>

    @if(request()->$filter_min_name && request()->$filter_max_name)
        <input type="hidden" value="{{ request()->$filter_min_name }}" name="{{ $filter_min_name }}" id="{{ $filter_min_name }}">
        <input type="hidden" value="{{ request()->$filter_max_name }}" name="{{ $filter_max_name }}" id="{{ $filter_max_name }}">
    @else
        <input type="hidden" value="{{ $lowest_number }}" name="{{ $filter_min_name }}" id="{{ $filter_min_name }}">
        <input type="hidden" value="{{ $highest_number }}" name="{{ $filter_max_name }}" id="{{ $filter_max_name }}">
    @endif
</div>