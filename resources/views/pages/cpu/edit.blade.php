<x-crud.edit title="CPU" action="{{ route('products.cpu.edit_post', $cpu->id) }}" delete_action="{{ route('products.cpu.delete', $cpu->id) }}" :product="$cpu">

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

</x-crud.edit>
