<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cpu;

class CpuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Cpu::create([
            'manufacturer_id' => 1,
            'series_id' => 1,
            'socket_id' => 1,
            'name' => 'AMD Ryzen 3 3100',
            'image' => '5-3100.jpg',
            'price' => 99.90,
            'core_count' => 4,
            'core_clock' => 3.6,
            'boost_clock' => 3.9,
            'tdp' => 65,
            'smt' => true,
            'has_cooler' => true,
            'integrated_graphics' => true,
        ]);

        Cpu::create([
            'manufacturer_id' => 1,
            'series_id' => 2,
            'socket_id' => 1,
            'name' => 'AMD Ryzen 5 3600',
            'image' => '49fca908d8863ded4df790bd3af6bc12.256p.jpg',
            'price' => 199.90,
            'core_count' => 6,
            'core_clock' => 3.6,
            'boost_clock' => 4.2,
            'tdp' => 65,
            'smt' => true,
            'has_cooler' => true,
            'integrated_graphics' => true,
        ]);

        Cpu::create([
            'manufacturer_id' => 1,
            'series_id' => 3,
            'socket_id' => 1,
            'name' => 'AMD Ryzen 7 3700X',
            'image' => '23cd3adfd50037c1b44d6d53edb15248.256p.jpg',
            'price' => 299.90,
            'core_count' => 8,
            'core_clock' => 3.6,
            'boost_clock' => 4.4,
            'tdp' => 65,
            'smt' => false,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        Cpu::create([
            'manufacturer_id' => 1,
            'series_id' => 4,
            'socket_id' => 1,
            'name' => 'AMD Ryzen 9 3900X',
            'image' => '14adcd1fc88ebf386b746037c966b6af.256p.jpg',
            'price' => 499.90,
            'core_count' => 12,
            'core_clock' => 3.8,
            'boost_clock' => 4.6,
            'tdp' => 105,
            'smt' => false,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        Cpu::create([
            'manufacturer_id' => 1,
            'series_id' => 5,
            'socket_id' => 1,
            'name' => 'AMD Threadripper 3960X',
            'image' => '3ada9b0ee52763b884f3f76b681846ad.256p.jpg',
            'price' => 999.90,
            'core_count' => 24,
            'core_clock' => 3.8,
            'boost_clock' => 4.5,
            'tdp' => 280,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        Cpu::create([
            'manufacturer_id' => 2,
            'series_id' => 8,
            'socket_id' => 7,
            'name' => 'Intel Core i7-12700K',
            'image' => '3f7037db801def4db8418df8e7498e6a.256p.jpg',
            'price' => 299.90,
            'core_count' => 12,
            'core_clock' => 3.6,
            'boost_clock' => 5.0,
            'tdp' => 125,
            'smt' => false,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        Cpu::create([
            'manufacturer_id' => 2,
            'series_id' => 9,
            'socket_id' => 7,
            'name' => 'Intel Core i9-12900K',
            'image' => 'b9d3c68bbf713cdd1211f3792040ce95.256p.jpg',
            'price' => 399.90,
            'core_count' => 16,
            'core_clock' => 3.7,
            'boost_clock' => 5.2,
            'tdp' => 125,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        Cpu::create([
            'manufacturer_id' => 2,
            'series_id' => 9,
            'socket_id' => 7,
            'name' => 'Intel Core i9-12900KF',
            'image' => 'c3d3a6843e0c0a5d98155e9fa68c092c.256p.jpg',
            'price' => 599.90,
            'core_count' => 16,
            'core_clock' => 4.2,
            'boost_clock' => 6.0,
            'tdp' => 125,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => false,
        ]);
    }
}
