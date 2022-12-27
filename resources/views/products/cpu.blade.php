{{-- Header --}}
@include('layouts.header')

<div class="flex w-screen justify-center">
    <div class="grid grid-cols-8 w-screen">

        {{-- Sidebar --}}
        <div class="py-12 col-span-1">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white min-w-48">
                        <p>Filters</p>
                        <p>test</p>
                        <p>test</p>
                        <p>test</p>
                        <p>test</p>
                        <p>test</p>
                        <p>test</p>
                        <p>test</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main section --}}
        <div class="py-12 col-span-7">
            <div class="sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white">
                        {{-- Information --}}
                        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                            <div class="flex items-end">
                                <h1 class="text-3xl font-bold">List of CPU's</h1>
                            </div>
                        </div>

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
                                        <th scope="col" class="py-3 px-6">
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
                                            <td class="py-4 px-6 font-medium whitespace-nowrap text-white w-48">
                                                @if($cpu->integrated_graphics == 1)
                                                    <p>Yes</p>
                                                @else
                                                    <p>No</p>
                                                @endif
                                            </td>
                                            <td>
                                                <p class="py-4 px-6 font-medium whitespace-nowrap text-white w-36">€{{ number_format($cpu->price, 2, ',', '.') }}</p>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <button class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Select</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

{{-- Footer --}}
@include('layouts.footer')
