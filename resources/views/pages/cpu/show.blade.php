{{-- Header --}}
@include('layouts.header')

<a href="{{ URL::previous() }}" class="text-white underline p-2 relative top-2">Go back</a>

{{-- Main section --}}
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-white">
                {{-- CPU Image and Name --}}
                <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                    <div class="w-full text-center">
                        <img class="w-1/4 mx-auto" src="{{ asset('img/products/' . $cpu->image ) }}" alt="">
                        <p class="mt-2">€{{ number_format($cpu->price, 2, ',', '.') }}</p>
                        <h1 class="mb-8 text-3xl font-bold">{{ $cpu->name }}</h1>
                    </div>                    
                </div>

                {{-- CPU Details --}}
                <div class="grid grid-cols-2 gap-8">
                    {{-- Left side --}}
                    <div class="text-end">

                        {{-- Manufacturer --}}
                        <div class="border-b border-gray-700">
                            <p class="text-gray-400">Manufacturer</p>
                            <p class="text-xl font-bold mb-2">{{ $cpu->manufacturer->name }}</p>
                        </div>

                        {{-- Series --}}
                        <div class="border-b border-gray-700 mt-2">
                            <p class="text-gray-400">Series</p>
                            <p class="text-xl font-bold mb-2">{{ $cpu->series->name }}</p>
                        </div>

                        {{-- Model --}}
                        <div class="border-b border-gray-700 mt-2">
                            <p class="text-gray-400">Socket</p>
                            <p class="text-xl font-bold mb-2">{{ $cpu->socket->name }}</p>
                        </div>

                        {{-- Stock cooler --}}
                        <div class="border-b border-gray-700 mt-2">
                            <p class="text-gray-400">Stock cooler</p>
                            @if($cpu->stock_cooler == 1)
                                <p class="text-xl font-bold mb-2 text-green-400">Yes</p>
                            @else
                                <p class="text-xl font-bold mb-2 text-red-500">No</p>
                            @endif
                        </div>

                        {{-- Integrated graphics --}}
                        <div class="border-b border-gray-700 mt-2">
                            <p class="text-gray-400">Integrated graphics</p>
                            @if($cpu->integrated_graphics == 1)
                                <p class="text-xl font-bold mb-2 text-green-400">Yes</p>
                            @else
                                <p class="text-xl font-bold mb-2 text-red-500">No</p>
                            @endif
                        </div>
                    </div>

                    {{-- Right side --}}
                    <div>

                        {{-- Core count --}}
                        <div class="border-b border-gray-700">
                            <p class="text-gray-400">Core count</p>
                            <p class="text-xl font-bold mb-2">{{ $cpu->core_count }}</p>
                        </div>

                        {{-- Clock speed --}}
                        <div class="border-b border-gray-700 mt-2">
                            <p class="text-gray-400">Base clock speed</p>
                            <p class="text-xl font-bold mb-2">{{ $cpu->core_clock }} GHz</p>
                        </div>

                        {{-- Boost clock --}}
                        <div class="border-b border-gray-700 mt-2">
                            <p class="text-gray-400">Boost clock speed</p>
                            <p class="text-xl font-bold mb-2">{{ $cpu->boost_clock }} GHz</p>
                        </div>

                        {{-- TDP --}}
                        <div class="border-b border-gray-700 mt-2">
                            <p class="text-gray-400">TDP</p>
                            <p class="text-xl font-bold mb-2">{{ $cpu->tdp }} W</p>
                        </div>

                        {{-- SMT --}}
                        <div class="border-b border-gray-700 mt-2">
                            <p class="text-gray-400">SMT</p>
                            @if($cpu->smt == 1)
                                <p class="text-xl font-bold mb-2 text-green-400">Yes</p>
                            @else
                                <p class="text-xl font-bold mb-2 text-red-500">No</p>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>     

{{-- Footer --}}
@include('layouts.footer')
