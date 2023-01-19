{{-- Header --}}
@include('layouts.header')

<div class="flex w-screen justify-center">
    <div class="grid grid-cols-8 w-screen">

        {{-- Sidebar --}}
        <div class="py-12 col-span-2">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white min-w-48">

                        {{-- Filter top --}}
                        <div class="flex justify-between items-end mb-4">
                            <p class="font-bold text-2xl">Filters</p>
                            <a class="underline" href="{{ route('products.cpu.search') }}">Reset all</a>
                        </div>
                        
                        {{-- All filters --}}
                        <form action="" method="GET" id="filter_form">
                            <div class="form-control">
                                {{-- Search filter --}}
                                <x-filters.search/>

                                {{-- Submit button --}}
                                <button type="submit" class="mb-2 text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Apply filter</button>

                                {{-- Price (slider) --}}
                                <x-filters.slider filter_title="Price" filter_slider_name="price_slider" filter_min_name="price_min" filter_max_name="price_max" lowest_number="{{ $lowestPrice }}" highest_number="{{ $highestPrice }}" label_before="€"/>

                                {{-- Manufacturer filter --}}
                                <x-filters.checkbox filter_title="Manufacturers" filter_name="manufacturer" :foreach_var="$manufacturers"/>

                                {{-- Series filter --}}
                                <x-filters.checkbox filter_title="Series" filter_name="serie" :foreach_var="$series"/>

                                {{-- Socket filter --}}
                                <x-filters.checkbox filter_title="Sockets" filter_name="socket" :foreach_var="$sockets"/>
                                
                                {{-- Core count filter (slider) --}}
                                <x-filters.slider filter_title="Core count" filter_slider_name="core_count_slider" filter_min_name="core_count_min" filter_max_name="core_count_max" lowest_number="{{ $lowestCoreCount }}" highest_number="{{ $highestCoreCount }}"/>

                                {{-- TDP filter (slider) --}}
                                <x-filters.slider filter_title="TDP" filter_slider_name="tdp_slider" filter_min_name="tdp_min" filter_max_name="tdp_max" lowest_number="{{ $lowestTdp }}" highest_number="{{ $highestTdp }}" label_after=" W"/>

                                {{-- Integrated graphics filter (radio) --}}
                                <x-filters.radio filter_title="Integrated Graphics" filter_name="integrated_graphics"/>

                                {{-- SMT filter (radio) --}}
                                <x-filters.radio filter_title="SMT" filter_name="smt"/>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        {{-- Main section --}}
        <div class="py-12 col-span-6">
            <div class="sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white">

                        {{-- Information --}}
                        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                            <div class="">
                                <h1 class="text-3xl font-bold">List of CPU's</h1>
                                @if(count($cpus) > 0)
                                    <p class="text-gray-400">Found {{ count($cpus) }} products with your current filters.</p>
                                @endif
                            </div>
                            <div>
                                <a href="{{ route('products.cpu.create') }}" class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Add new CPU</a>
                            </div>
                        </div>

                        {{-- Check if there are CPU's found --}}
                        @if(count($cpus) == 0)
                            {{-- warning box --}}
                            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                                <p class="font-bold text-2xl">Oh no! No CPU's found :(</p>
                                <p>Try to change your filters</p>
                            </div>
                        @else

                        {{-- Success message --}}
                        @if(session('success'))
                            <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                                <p class="font-bold text-2xl">Success!</p>
                                <p>{{ session('success') }}</p>
                            </div>
                        @endif

                        {{-- Table of parts --}}
                        <div class="overflow-x-auto relative rounded-md">
                            <table class="w-full text-sm text-left text-gray-400">

                                {{-- Top row --}}
                                <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 w-1">
                                            Name
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Core Count
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Core Clock
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Boost Clock
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            TDP
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            SMT
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Integrated Graphics
                                        </th>
                                        <th scope="col" class="py-3 px-6 w-fit">
                                            Price
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                {{-- All products --}}
                                <tbody>
                                    @foreach($cpus as $cpu)
                                        <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-700">
                                            <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white font-bold w-80">
                                                <div class="flex items-center">
                                                    <img src="{{ asset('img/products/cpu/' . $cpu->image) }}" alt="" class="w-12 mr-2">
                                                    <a class="hover:text-blue-500 hover:underline" href="{{ route('products.cpu.show', $cpu->id) }}">{{ $cpu->name }}</a>
                                                </div>
                                            </th>
                                            <td class="py-4 px-6 font-medium whitespace-nowrap text-white w-36">
                                                <p>{{ $cpu->core_count }}</p>
                                            </td>
                                            <td class="py-4 px-6 font-medium whitespace-nowrap text-white w-36">
                                                <p>{{ $cpu->core_clock }} GHz</p>
                                            </td>
                                            <td class="py-4 px-6 font-medium whitespace-nowrap text-white w-36">
                                                <p>{{ $cpu->boost_clock }} GHz</p>
                                            </td>
                                            <td class="py-4 px-6 font-medium whitespace-nowrap text-white w-36">
                                                <p>{{ $cpu->tdp }} W</p>
                                            </td>
                                            <td class="py-4 px-6 font-medium whitespace-nowrap text-white w-12">
                                                @if($cpu->smt == 1)
                                                    <p>Yes</p>
                                                @else
                                                    <p>No</p>
                                                @endif
                                            </td>
                                            <td class="py-4 px-6 font-medium whitespace-nowrap text-white w-60">
                                                @if($cpu->integrated_graphics == 1)
                                                    <p>Yes</p>
                                                @else
                                                    <p>No</p>
                                                @endif
                                            </td>
                                            <td class="text-right w-fit">
                                                <p class="w-fit py-4 px-6 font-medium whitespace-nowrap text-white">€{{ number_format($cpu->price, 2, ',', '.') }}</p>
                                            </td>
                                            <td class="py-4 px-6 font-medium whitespace-nowrap text-white w-60">
                                                <a class="font-bold text-blue-500 hover:text-white hover:underline" href="{{ route('builder.cpu.add', $cpu->id) }}">
                                                    Select CPU
                                                </a>
                                            </td>
                                            @auth
                                                @if(Auth::user()->is_admin == true)
                                                    <td class="font-medium whitespace-nowrap text-white w-60">
                                                        <a class="font-bold text-blue-500 hover:text-white hover:underline" href="{{ route('products.cpu.edit', $cpu->id) }}">
                                                            Edit
                                                        </a>
                                                    </td>
                                                @endif
                                            @endauth
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Double handle slider --}}
<script 
    type="text/javascript" 
    src="https://cdn.jsdelivr.net/gh/maxshuty/accessible-web-components@latest/dist/simpleRange.min.js">
</script>

<script>
    
    // Get all the elements
    var price_min = document.getElementById("price_min");
    var price_max = document.getElementById("price_max");
    var core_count_min = document.getElementById("core_count_min");
    var core_count_max = document.getElementById("core_count_max");
    var tdp_min = document.getElementById("tdp_min");
    var tdp_max = document.getElementById("tdp_max");
    var filter_form = document.getElementById("filter_form");

    

    // Price slider
    window.addEventListener('price_slider', (e) => {
        const data = e.detail;
        price_min.value = data.minRangeValue;
        price_max.value = data.maxRangeValue;
        filter_form.submit();
    });

    // Core count slider
    window.addEventListener('core_count_slider', (e) => {
        const data = e.detail;
        core_count_min.value = data.minRangeValue;
        core_count_max.value = data.maxRangeValue;
        filter_form.submit();
    });

    // TDP slider
    window.addEventListener('tdp_slider', (e) => {
        const data = e.detail;
        tdp_min.value = data.minRangeValue;
        tdp_max.value = data.maxRangeValue;
        filter_form.submit();
    });



    // Radio filters submit on change
    var radio_filters = [];

    var smt = document.querySelectorAll('input[name="smt"]');
    var integrated_graphics = document.querySelectorAll('input[name="integrated_graphics"]');

    radio_filters.push(integrated_graphics, smt);

    for (var i = 0; i < radio_filters.length; i++) {
        for (var j = 0; j < radio_filters[i].length; j++) {
            radio_filters[i][j].addEventListener('change', function() {
                filter_form.submit();
            });
        }
    }



    // Checkbox filters submit on change

    // Manufacturer checkboxes
    var manufacturer_checkboxes = document.querySelectorAll('input[name="manufacturer[]"]');
    addCheckboxEvent(manufacturer_checkboxes, filter_form);

    // Series checkboxes
    var serie_checkboxes = document.querySelectorAll('input[name="serie[]"]');
    addCheckboxEvent(serie_checkboxes, filter_form);    

    // Socket checkboxes
    var socket_checkboxes = document.querySelectorAll('input[name="socket[]"]');
    addCheckboxEvent(socket_checkboxes, filter_form);

    // Checkbox change event
    function addCheckboxEvent(checkboxes, form) {
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                if (this.value == 'all') 
                {
                    checkboxes.forEach(function(innerCheckbox) {
                        if (innerCheckbox.value != 'all') 
                        {
                            innerCheckbox.checked = false;
                        }
                    });
                } 
                else 
                {
                    checkboxes[0].checked = false;
                }

                form.submit();
            });
        });
    }

</script>       

{{-- Footer --}}
@include('layouts.footer')
