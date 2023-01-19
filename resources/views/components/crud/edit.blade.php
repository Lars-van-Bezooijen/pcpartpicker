@props([
    'title',
    'action',
    'delete_action',
    'product' => [],
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
                        <h1 class="mb-8 text-3xl font-bold">Edit {{ $title }}</h1>
                        <div class="grid grid-cols-2 gap-8 gap-x-24">
                            
                            {{-- Inputs --}}
                            {{ $slot }}

                            {{-- Buttons --}}
                            <a href="{{ URL::previous() }}" class="hover:border-blue-700 font-extrabold text-white border-2 border-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Cancel</a>
    
                            <div class="w-full flex items-center">
                                <div class="w-full">
                                    <button type="submit" class="w-full">
                                        <a class="hover:border-blue-700 mr-4 block font-extrabold text-white border-2 border-blue-600 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Confirm</a>
                                    </button>
                                    
                                </div>
                                
                                <div class="flex items-center hover:cursor-pointer">
                                    <a id="deleteConfirm">
                                        <div class="w-10 bg-red-500 border-2 border-red-500 rounded-md">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                        
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>   

<div id="deleteModal" class="hidden fixed w-screen h-screen z-10 left-0 top-0 overflow-auto bg-black bg-opacity-50">
    <div class="relative w-full h-full max-w-md md:h-auto m-auto top-half" style="top:50%; transform: translateY(-50%)">
        <div class="relative rounded-lg shadow bg-gray-700">
            <button id="closeModal" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-800 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-white">Are you sure you want to delete this product?</h3>
                <button id="confirmDelete" type="button" class="text-white bg-red-500 border-2 border-red-500 focus:ring-4 focus:outline-none focus:ring-red-500 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2 font-bold">
                    Yes, I'm sure
                </button>
                <button id="cancelDelete" type="button" class="text-white hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-600 rounded-lg border-2 border border-white text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10 font-bold">No, cancel</button>
            </div>
        </div>
    </div>
    <form action="{{ $delete_action }}" method="POST">
        @csrf
        @method('DELETE')
    </form>
</div>

<script>
    var deleteConfirm = document.getElementById('deleteConfirm');
    var deleteModal = document.getElementById('deleteModal');
    var closeModal = document.getElementById('closeModal');
    var cancelDelete = document.getElementById('cancelDelete');
    var confirmDelete = document.getElementById('confirmDelete');

    deleteConfirm.addEventListener('click', function() {
        deleteModal.classList.toggle('hidden');
    });

    closeModal.addEventListener('click', function() {
        deleteModal.classList.toggle('hidden');
    });

    cancelDelete.addEventListener('click', function() {
        deleteModal.classList.toggle('hidden');
    });

    window.addEventListener('click', function(e) {
        if (e.target == deleteModal) {
            deleteModal.classList.toggle('hidden');
        }
    });

    confirmDelete.addEventListener('click', function() {
        document.querySelector('#deleteModal form').submit();
    });
</script>

{{-- Footer --}}
@include('layouts.footer')