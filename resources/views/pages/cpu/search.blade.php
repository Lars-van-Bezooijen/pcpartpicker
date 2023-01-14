{{-- Header --}}
@include('layouts.header')

<div class="flex w-screen justify-center">
    <div class="grid grid-cols-8 w-screen">

        {{-- Sidebar --}}
        <div class="py-12 col-span-2">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white min-w-48">
                        <div class="flex justify-between items-end mb-4">
                            <p class="font-bold text-2xl">Filters</p>
                            <a class="underline" href="{{ route('products.cpu.search') }}">Reset</a>
                        </div>
                        
                        <form action="" method="GET" id="filter_form">
                            <div class="form-control pb-2 mb-4 border-b border-white">
                                {{-- Search filter --}}
                                <label for="search" class="mb-2 text-sm font-medium sr-only text-white">Search</label>
                                <div class="relative mb-4">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    </div>
                                    <input name="search" type="search" id="search_input" class="block w-full p-4 pl-10 text-sm border border-gray-300 rounded-lg focus:ring-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:border-blue-500" placeholder="Enter product name..." @if(request()->search) value="{{ request()->search }}" @endif)>
                                </div>

                                {{-- Submit button --}}
                                <button type="submit" class="mb-2 text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Apply filter</button>

                                {{-- Price filter --}}
                                <div class="form-control pb-2 mb-4 border-b border-white">
                                    <p class="font-bold">Price</p>
                                    <div class="mb-2">
                                        @if(request()->price_min && request()->price_max)
                                            <range-selector min-range="{{ $cheapestCpu }}" max-range="{{ $mostExpensiveCpu }}" slider-color="#384454" circle-border="3px solid #1c64f3" circle-focus-border="5px solid #1c64f3" label-before="€"  event-name-to-emit-on-change="price_slider" preset-min="{{ request()->price_min }}" preset-max="{{ request()->price_max }}"/>
                                        @else
                                            <range-selector min-range="{{ $cheapestCpu }}" max-range="{{ $mostExpensiveCpu }}" slider-color="#384454" circle-border="3px solid #1c64f3" circle-focus-border="5px solid #1c64f3" label-before="€"  event-name-to-emit-on-change="price_slider"/>
                                        @endif
                                    </div>

                                    @if(request()->price_min && request()->price_max)
                                        <input type="hidden" value="{{ request()->price_min }}" name="price_min" id="price_min">
                                        <input type="hidden" value="{{ request()->price_max }}" name="price_max" id="price_max">
                                    @else
                                        <input type="hidden" value="{{ $cheapestCpu }}" name="price_min" id="price_min">
                                        <input type="hidden" value="{{ $mostExpensiveCpu }}" name="price_max" id="price_max">
                                    @endif
                                </div>

                                {{-- Core count filter --}}
                                <div class="form-control pb-2 mb-4 border-b border-white">
                                    <p class="font-bold">Core count</p>
                                    <div class="mb-2">
                                        @if(request()->core_min && request()->core_max)
                                            <range-selector min-range="{{ $lowestCoreCount }}" max-range="{{ $highestCoreCount }}" slider-color="#384454" circle-border="3px solid #1c64f3" circle-focus-border="5px solid #1c64f3" event-name-to-emit-on-change="core_count_slider" preset-min="{{ request()->core_min }}" preset-max="{{ request()->core_max }}"/>
                                        @else
                                            <range-selector min-range="{{ $lowestCoreCount }}" max-range="{{ $highestCoreCount }}" slider-color="#384454" circle-border="3px solid #1c64f3" circle-focus-border="5px solid #1c64f3" event-name-to-emit-on-change="core_count_slider"/>
                                        @endif
                                    </div>

                                    @if(request()->core_min && request()->core_max)
                                        <input type="hidden" value="{{ request()->core_min }}" name="core_min" id="core_min">
                                        <input type="hidden" value="{{ request()->core_max }}" name="core_max" id="core_max">
                                    @else
                                        <input type="hidden" value="{{ $lowestCoreCount }}" name="core_min" id="core_min">
                                        <input type="hidden" value="{{ $highestCoreCount }}" name="core_max" id="core_max">
                                    @endif
                                </div>

                                {{-- TDP filter --}}
                                <div class="form-control pb-2 mb-4 border-b border-white">
                                    <p class="font-bold">TDP</p>
                                    <div class="mb-2">
                                        @if(request()->tdp_min && request()->tdp_max)
                                            <range-selector min-range="{{ $lowestTdp }}" max-range="{{ $highestTdp }}" slider-color="#384454" circle-border="3px solid #1c64f3" circle-focus-border="5px solid #1c64f3" event-name-to-emit-on-change="tdp_slider" preset-min="{{ request()->tdp_min }}" preset-max="{{ request()->tdp_max }}" label-after=" W"/>
                                        @else
                                            <range-selector min-range="{{ $lowestTdp }}" max-range="{{ $highestTdp }}" slider-color="#384454" circle-border="3px solid #1c64f3" circle-focus-border="5px solid #1c64f3" event-name-to-emit-on-change="tdp_slider" label-after=" W"/>
                                        @endif
                                    </div>

                                    @if(request()->tdp_min && request()->tdp_max)
                                        <input type="hidden" value="{{ request()->tdp_min }}" name="tdp_min" id="tdp_min">
                                        <input type="hidden" value="{{ request()->tdp_max }}" name="tdp_max" id="tdp_max">
                                    @else
                                        <input type="hidden" value="{{ $lowestCoreCount }}" name="tdp_min" id="tdp_min">
                                        <input type="hidden" value="{{ $highestCoreCount }}" name="tdp_max" id="tdp_max">
                                    @endif
                                </div>
                                
                                {{-- Integrated Graphics filter --}}
                                <p class="font-bold">Integrated Graphics</p>
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
                            {{-- SMT Filter --}}
                            <div class="form-control pb-2 mb-4 border-b border-white">
                                <p class="font-bold">SMT</p>
                                <div>
                                    <input type="radio" name="smt" value="all" id="smt_all" @if(request()->smt == 'all' || !isset(request()->smt) ) checked @endif>
                                    <label for="smt_all">All</label>
                                </div>
                                <div>
                                    <input type="radio" name="smt" value="1" id="smt_yes" @if(request()->smt == '1') checked @endif>
                                    <label for="smt_yes">Yes</label>
                                </div>
                                <div>
                                    <input type="radio" name="smt" value="0" id="smt_no" @if(request()->smt == '0') checked @endif>
                                    <label for="smt_no">No</label>
                                </div>
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
                                                <a href="{{ route('builder.cpu.add', $cpu->id) }}">
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

{{-- Double handle slider --}}
<script 
  type="text/javascript" 
  src="https://cdn.jsdelivr.net/gh/maxshuty/accessible-web-components@latest/dist/simpleRange.min.js">
</script>

<script>
    
    // Submit filter form on input
    var price_min = document.getElementById("price_min");
    var price_max = document.getElementById("price_max");
    var core_min = document.getElementById("core_min");

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
        core_min.value = data.minRangeValue;
        core_max.value = data.maxRangeValue;
        filter_form.submit();
    });

    // TDP slider
    window.addEventListener('tdp_slider', (e) => {
        const data = e.detail;
        tdp_min.value = data.minRangeValue;
        tdp_max.value = data.maxRangeValue;
        filter_form.submit();
    });

</script>       

{{-- Footer --}}
@include('layouts.footer')