{{-- Header --}}
@include('layouts.header')

<div class="flex w-screen justify-center">
    <div class="grid grid-cols-8 w-screen">

        {{-- Sidebar --}}
        <div class="py-12 col-span-2">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white min-w-48">
                        <p class="font-bold mb-2 text-2xl">Filters</p>
                        <form action="" method="GET" id="filter_form">
                            <div class="form-control pb-2 mb-4 border-b border-white">
                                {{-- Integrated Graphics filter --}}
                                <p>Integrated Graphics</p>
                                <div>
                                    <input type="radio" name="integrated_graphics" value="all" id="integrated_graphics_all" @if(request()->integrated_graphics == 'all' || !isset(request()->integrated_graphics) ) checked @endif>
                                    <label for="integrated_graphics_all">All</label>
                                </div>
                                <div>
                                    <input type="radio" name="integrated_graphics" value="1" id="integrated_graphics_yes" @if(request()->integrated_graphics == '1') checked @endif>
                                    <label for="integrated_graphics_yes">Yes</label>
                                </div>
                                <div>
                                    <input type="radio" name="integrated_graphics" value="0" id="integrated_graphics_no" @if(request()->integrated_graphics == '0') checked @endif>
                                    <label for="integrated_graphics_no">No</label>
                                </div>
                            </div>
                            {{-- Price filter --}}
                            {{-- <div class="form-control pb-2 mb-4 border-b border-white">
                                <p>Price / Min - Max</p>
                                <div class="price_slider">
                                    <input type="range" name="price_min" id="price_min" min="0" max="{{ $mostExpensiveCpu }}" value="{{ request()->price_min ?? 0 }}" step="0.1">
                                    <input type="range" name="price_max" id="price_max" min="0" max="{{ $mostExpensiveCpu }}" value="{{ request()->price_max ?? 1000 }}" step="0.1">
                                    <input type="number" id="price_min_output" step="0.1" @if(!request()->price_min) value="0" @endif>

                                    <input type="number" id="price_max_output" step="0.1" @if(!request()->price_max) value="{{ $mostExpensiveCpu }}" @endif>
                                </div>
                            </div> --}}

                            <div>
                                
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
                            <div class="flex items-end">
                                <h1 class="text-3xl font-bold">List of CPU's</h1>
                            </div>
                        </div>


                        <form action="" method="GET" id="search-form">   
                            <label for="search" class="mb-2 text-sm font-medium sr-only text-white">Search</label>
                            <div class="relative mb-8">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </div>
                                <input name="test" type="search" id="search" class="block w-full p-4 pl-10 text-sm border border-gray-300 rounded-lg focus:ring-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:border-blue-500" placeholder="Enter product name...">
                            </div>
                        </form>


                        {{-- Check if there are CPU's found --}}
                        @if(count($cpus) == 0)
                            {{-- warning box --}}
                            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                                <p class="font-bold text-2xl">Oh no! No CPU's found :(</p>
                                <p>Try to change your filters</p>
                            </div>
                        @else
                        {{-- Table of parts --}}
                        <div class="overflow-x-auto relative rounded-md">
                            <table class="w-full text-sm text-left text-gray-400">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cpus as $cpu)
                                        <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-700">
                                            <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white font-bold w-80">
                                                <div class="flex items-center">
                                                    <img src="{{ asset('img/products/' . $cpu->image) }}" alt="" class="w-12 mr-2">
                                                    <p>{{ $cpu->name }}</p>
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
                                                <a href="#">
                                                    <button class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Select</button>
                                                </a>
                                            </td>
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

<script>
    // Submit filter form on input
    var filter_form = document.getElementById("filter_form");
    filter_form.oninput = function() {
        filter_form.submit();
    }

    // Submit search form on change
    var search_form = document.getElementById("search_form");
    search_form.onchange = function() {
        search_form.submit();
    }


    // Price slider
    var price_min = document.getElementById("price_min");
    var price_max = document.getElementById("price_max");
    var output_min = document.getElementById("price_min_output");
    var output_max = document.getElementById("price_max_output");
    output_min.innerHTML = price_min.value;
    output_max.innerHTML = price_max.value;

    price_min.oninput = function() {
        output_min.value = this.value;
    }
    price_max.oninput = function() {
        output_max.value = this.value;
    }

</script>

{{-- Footer --}}
@include('layouts.footer')
