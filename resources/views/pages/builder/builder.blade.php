{{-- Header --}}
@include('layouts.header')

{{-- Main section --}}
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-white">
                {{-- Information --}}
                <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                    <div class="flex items-end">
                        <h1 class="text-3xl font-bold">Build your PC</h1>
                    </div>
                </div>

                {{-- Table of parts --}}
                <div class="overflow-x-auto relative rounded-md">
                    <table class="w-full text-sm text-left text-gray-400">
                        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6 w-1">
                                    Component
                                </th>
                                <th scope="col" class="py-3 px-6 w-fit">
                                    Selection
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Price
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b bg-gray-800 border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white font-bold underline">
                                    <a class="text-blue-500 hover:text-white" href="{{ route('products.cpu.search') }}">CPU</a>
                                </th>
                                <td class="py-4 px-6 font-medium whitespace-nowrap text-white font-bold">
                                    @if (isset($sessionProducts['cpu']))
                                        <div class="flex items-center">
                                            <img class="w-12 mr-2" src="{{ asset('img/products/cpu/' . $sessionProducts['cpu']['image']) }}" alt="">
                                            <a class="hover:text-blue-500 hover:underline" href="{{ route('products.cpu.show', $sessionProducts['cpu']['id']) }}">{{ $sessionProducts['cpu']['name'] }}</a>
                                        </div>
                                    @else
                                        <a href="{{ route('products.cpu.search') }}">
                                            <button class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Add a CPU...</button>
                                        </a>
                                    @endif
                                </td>
                                <td class="py-4 px-6 font-medium whitespace-nowrap text-white">
                                    @if (isset($sessionProducts['cpu']))
                                        <p class="font-medium">€{{ number_format($sessionProducts['cpu']['price'], 2, ',', '.') }}</p>
                                    @endif
                                </td>
                                <td class="w-8 relative right-4">
                                    @if (isset($sessionProducts['cpu']))
                                        <a href="{{ route('builder.cpu.remove', $sessionProducts['cpu']['id']) }}">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#f45454" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            
                            <tr class="border-b bg-gray-800 border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white font-bold underline">
                                    <a class="text-blue-500 hover:text-white" href="#">GPU</a>
                                </th>
                                <td class="py-4 px-6 font-medium whitespace-nowrap text-white">
                                    <a href="#">
                                        <button class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Add a GPU...</button>
                                    </a>
                                </td>
                                <td class="py-4 px-6 font-medium whitespace-nowrap text-white">
                                    <p>price</p>
                                </td>
                            </tr>

                            <tr class="border-b bg-gray-800 border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white font-bold underline">

                                </th>
                                <td class="py-4 px-6 font-medium whitespace-nowrap text-white text-right">
                                    <p>Total price:</p>
                                </td>
                                <td class="py-4 px-6 font-medium whitespace-nowrap text-white">
                                    <p>€289,50</p>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>     

{{-- Footer --}}
@include('layouts.footer')
