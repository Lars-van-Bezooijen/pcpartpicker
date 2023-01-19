<x-crud.create title="CPU" action="{{ route('products.cpu.create_post') }}">

    <x-crud.input_dropdown title="Manufacturer" name="manufacturer" :options="$manufacturers"/>
    <x-crud.input_text title="Name" name="name"/>
    <x-crud.input_dropdown title="Serie" name="serie" :options="$series"/>
    <x-crud.input_number title="Price" name="price"/>
    <x-crud.input_dropdown title="Socket" name="socket" :options="$sockets"/>
    <x-crud.input_number title="Core count" name="core_count"/>
    <x-crud.input_boolean title="SMT" name="smt"/>
    <x-crud.input_number title="Core clock (GHz)" name="core_clock"/>
    <x-crud.input_boolean title="Stock cooler" name="has_cooler"/>
    <x-crud.input_number title="Boost clock (GHz)" name="boost_clock"/>
    <x-crud.input_boolean title="Integrated graphics" name="integrated_graphics"/>
    <x-crud.input_number title="TDP" name="tdp"/>
    <x-crud.input_image title="Image" name="image"/>
    
    <p></p>
    <a href="{{ URL::previous() }}" class="hover:border-blue-700 font-extrabold text-white border-2 border-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Cancel</a>

    <button type="submit" class="w-full">
        <a class="hover:border-blue-700 mr-4 block font-extrabold text-white border-2 border-blue-600 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Confirm</a>
    </button>

</x-crud.create>
