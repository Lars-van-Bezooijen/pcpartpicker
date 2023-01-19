<x-crud.edit title="CPU" action="{{ route('products.cpu.edit', $cpu->id) }}" delete_action="{{ route('products.cpu.delete', $cpu->id) }}" :product="$cpu">

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

    <a href="{{ URL::previous() }}" class="hover:border-blue-700 font-extrabold text-white border-2 border-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Cancel</a>
    
    <div class="w-full flex items-center">
        <div class="w-full">
            <a href="" class="hover:border-blue-700 mr-4 block font-extrabold text-white border-2 border-blue-600 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Confirm</a>
        </div>
        
        <div class="flex items-center hover:cursor-pointer">
            <a id="deleteConfirm">
                <div class="w-10 bg-red-500 border-2 border-red-500 rounded-md">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                </div>
            </a>
        </div>

    </div>

</x-crud.edit>
