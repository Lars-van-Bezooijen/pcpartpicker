@props([
    'product',
    'product_image',
    'product_price',
    'product_name',
    'product_details_amount',
    'product_details_titles' => [],
    'product_details' => [],

])

{{-- Header --}}
@include('layouts.header')

<a href="{{ URL::previous() }}" class="text-white underline p-2 relative top-2">Go back</a>

{{-- Main section --}}
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-white">
                
                {{-- Product Image and Name --}}
                <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                    <div class="w-full text-center">
                        <img class="w-1/4 mx-auto" src="{{ asset('img/products/' . $product . '/' . $product_image) }}" alt="">
                        <p class="mt-2">€{{ number_format($product_price, 2, ',', '.') }}</p>
                        <h1 class="mb-8 text-3xl font-bold">{{ $product_name }}</h1>
                    </div>                    
                </div>

                {{-- Product information --}}
                <div class="grid grid-cols-2 gap-8">

                    {{-- Product details --}}
                    @for($i = 1; $i <= $product_details_amount; $i++)
                        
                        <div @if($i % 2 != 0) class="text-end" @endif>
                            <div class="border-b border-gray-700">
                                <p class="text-gray-400">{{ $product_details_titles[$i] }}</p>
                                <p class="text-xl font-bold mb-2">{{ $product_details[$i] }}</p>
                            </div>
                        </div>

                    @endfor
                </div>

            </div>
        </div>
    </div>
</div>     

{{-- Footer --}}
@include('layouts.footer')
