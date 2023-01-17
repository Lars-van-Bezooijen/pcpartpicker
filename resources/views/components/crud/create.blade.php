@props([
    'title',
    'amount_of_inputs',
    'input_names' => [],
])

{{-- Header --}}
@include('layouts.header')

<a href="{{ URL::previous() }}" class="text-white underline p-2 relative top-2">Go back</a>

{{-- Main section --}}
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-white">
                <form action="" method="POST">
                    @csrf
                    {{-- dark mode inputs --}}
                    <div class="bg-gray-800 p-4 rounded-md">
                        <h1 class="mb-8 text-3xl font-bold">Add your {{ $title }}</h1>
                        <div class="grid grid-cols-2 gap-8 gap-x-24">
                            {{-- Product details --}}
                            @for($i = 1; $i <= $amount_of_inputs; $i++)
                                
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-white">Input name</label>
                                    <div class="relative">
                                        <input type="text" id="email" name="email" class="bg-gray-700 border border-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mb-4 p-2.5 placeholder-gray-400 text-white" placeholder="">
                                    </div>
                                </div>

                            @endfor

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>     

{{-- Footer --}}
@include('layouts.footer')