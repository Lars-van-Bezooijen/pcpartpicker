@props([
    'title',
    'action',
])

{{-- Header --}}
@include('layouts.header')

<a href="{{ URL::previous() }}" class="text-white underline p-2 relative top-2">Go back</a>

{{-- Main section --}}
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-white">

                @if($errors->any())
                    <div class="bg-red-500 p-4 rounded-md mb-4">
                        <h1 class="text-2xl font-bold">Error</h1>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="bg-gray-800 p-4 rounded-md">
                        <h1 class="mb-8 text-3xl font-bold">Add your {{ $title }}</h1>
                        <div class="grid grid-cols-2 gap-8 gap-x-24">
                            
                            {{-- Inputs --}}
                            {{ $slot }}

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>     

{{-- Footer --}}
@include('layouts.footer')