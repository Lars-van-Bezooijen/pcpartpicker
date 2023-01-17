@php
    $product_titles = [
        1 => 'Manufacturer',
        2 => 'Series',
        3 => 'Socket',
        4 => 'Core count',
        5 => 'Base clock',
        6 => 'Boost clock',
        7 => 'TDP',
        8 => 'SMT',
        9 => 'Stock cooler',
        10 => 'Integrated graphics',
    ];

    $product_details = [
        1 => $cpu->manufacturer->name,
        2 => $cpu->series->name,
        3 => $cpu->socket->name,
        4 => $cpu->core_count,
        5 => $cpu->core_clock . ' GHz',
        6 => $cpu->boost_clock . ' GHz',
        7 => $cpu->tdp . ' W',
        8 => $cpu->smt == 1 ? 'Yes' : 'No',
        9 => $cpu->stock_cooler == 1 ? 'Yes' : 'No',
        10 => $cpu->integrated_graphics == 1 ? 'Yes' : 'No',
    ];
@endphp

<x-crud.create product="cpu" product_image="{{ $cpu->image }}" product_price="{{ $cpu->price }}" product_name="{{ $cpu->name }}" product_details_amount="10" :product_details_titles="$product_titles" :product_details="$product_details"/>