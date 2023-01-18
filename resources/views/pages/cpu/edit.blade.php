<x-crud.edit title="CPU" action="{{ route('products.cpu.edit', $cpu->id) }}" :product="$cpu">

    <x-crud.input_dropdown title="Manufacturer" name="manufacturer" :options="$manufacturers" :selected="$cpu->manufacturer_id"/>
    <x-crud.input_text title="Name" name="name" :value="$cpu->name"/>
    <x-crud.input_dropdown title="Serie" name="serie" :options="$series" :selected="$cpu->serie_id"/>
    <x-crud.input_number title="Price" name="price" :value="$cpu->price"/>
    <x-crud.input_dropdown title="Socket" name="socket" :options="$sockets" :selected="$cpu->socket_id"/>
    <x-crud.input_number title="Core count" name="core_count" :value="$cpu->core_count"/>
    <x-crud.input_boolean title="SMT" name="smt" :selected="$cpu->smt"/>
    <x-crud.input_number title="Core clock (GHz)" name="core_clock" :value="$cpu->core_clock"/>
    <x-crud.input_boolean title="Stock cooler" name="has_cooler" :selected="$cpu->has_cooler"/>
    <x-crud.input_number title="Boost clock (GHz)" name="boost_clock" :value="$cpu->boost_clock"/>
    <x-crud.input_boolean title="Integrated graphics" name="integrated_graphics" :selected="$cpu->integrated_graphics"/>
    <x-crud.input_number title="TDP" name="tdp" :value="$cpu->tdp"/>
    <x-crud.input_image title="Image" name="image" :value="$cpu->image"/>
    <img class="w-28" src="{{ asset('img/products/cpu/'.$cpu->image) }}" alt="">

    <a href="{{ URL::previous() }}" class="font-extrabold text-white border-2 border-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Cancel</a>
    
    <div class="w-full flex items-center">
        <div class="w-full">
            <a href="" class="mr-4 block font-extrabold text-white border-2 border-blue-600 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Confirm</a>
        </div>
        
        <div class="flex items-center">
            <a id="deleteConfirm">
                <div class="w-10 bg-red-500 border-2 border-red-500 rounded-md hover:bg-red-600">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                </div>
            </a>
        </div>

    </div>

</x-crud.edit>

<div id="deleteModal" class="hidden fixed w-screen h-screen z-10 left-0 top-0 overflow-auto bg-black bg-opacity-50">
    <div class="relative w-full h-full max-w-md md:h-auto ">
        <div class="relative rounded-lg shadow bg-gray-700">
            <button id="closeModal" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-800 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-white">Are you sure you want to delete this product?</h3>
                <button id="confirmDelete" type="button" class="text-white bg-red-500 border-2 border-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-500 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2 font-bold">
                    Yes, I'm sure
                </button>
                <button id="cancelDelete" type="button" class="text-white hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-600 rounded-lg border-2 border border-white text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10 font-bold">No, cancel</button>
            </div>
        </div>
    </div>
    <form action="{{ route('products.cpu.delete', $cpu->id) }}" method="POST">
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
