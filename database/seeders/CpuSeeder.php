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
        // AMD Threadripper 3990X
        Cpu::create([
            'manufacturer_id' => 1,
            'serie_id' => 5,
            'socket_id' => 5,
            'name' => 'AMD Threadripper 3990X',
            'image' => 'threadripper-3990X.jpg',
            'price' => 1999.00,
            'core_count' => 64,
            'core_clock' => 2.9,
            'boost_clock' => 4.3,
            'tdp' => 280,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // AMD Threadripper 3970X
        Cpu::create([
            'manufacturer_id' => 1,
            'serie_id' => 5,
            'socket_id' => 5,
            'name' => 'AMD Threadripper 3970X',
            'image' => 'threadripper-3970X.jpg',
            'price' => 1499.00,
            'core_count' => 32,
            'core_clock' => 3.7,
            'boost_clock' => 4.5,
            'tdp' => 280,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // AMD Threadripper 3960X
        Cpu::create([
            'manufacturer_id' => 1,
            'serie_id' => 5,
            'socket_id' => 5,
            'name' => 'AMD Threadripper 3960X',
            'image' => 'threadripper-3960X.jpg',
            'price' => 1199.00,
            'core_count' => 24,
            'core_clock' => 3.8,
            'boost_clock' => 4.5,
            'tdp' => 280,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // AMD Ryzen 9 3950XT
        Cpu::create([
            'manufacturer_id' => 1,
            'serie_id' => 4,
            'socket_id' => 5,
            'name' => 'AMD Ryzen 9 3950XT',
            'image' => 'ryzen-9-3950XT.jpg',
            'price' => 849.00,
            'core_count' => 16,
            'core_clock' => 3.5,
            'boost_clock' => 4.7,
            'tdp' => 105,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // AMD Ryzen 9 3950X
        Cpu::create([
            'manufacturer_id' => 1,
            'serie_id' => 4,
            'socket_id' => 5,
            'name' => 'AMD Ryzen 9 3950X',
            'image' => 'ryzen-9-3950X.jpg',
            'price' => 749.00,
            'core_count' => 16,
            'core_clock' => 3.5,
            'boost_clock' => 4.7,
            'tdp' => 105,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // AMD Ryzen 9 3900X
        Cpu::create([
            'manufacturer_id' => 1,
            'serie_id' => 4,
            'socket_id' => 5,
            'name' => 'AMD Ryzen 9 3900X',
            'image' => 'ryzen-9-3900X.jpg',
            'price' => 499.00,
            'core_count' => 12,
            'core_clock' => 3.8,
            'boost_clock' => 4.6,
            'tdp' => 105,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // AMD Ryzen 7 3800XT
        Cpu::create([
            'manufacturer_id' => 1,
            'serie_id' => 3,
            'socket_id' => 5,
            'name' => 'AMD Ryzen 7 3800XT',
            'image' => 'ryzen-7-3800XT.jpg',
            'price' => 449.00,
            'core_count' => 8,
            'core_clock' => 3.9,
            'boost_clock' => 4.5,
            'tdp' => 105,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // AMD Ryzen 7 3800X
        Cpu::create([
            'manufacturer_id' => 1,
            'serie_id' => 3,
            'socket_id' => 5,
            'name' => 'AMD Ryzen 7 3800X',
            'image' => 'ryzen-7-3800X.jpg',
            'price' => 399.00,
            'core_count' => 8,
            'core_clock' => 3.9,
            'boost_clock' => 4.5,
            'tdp' => 105,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // AMD Ryzen 7 3700X
        Cpu::create([
            'manufacturer_id' => 1,
            'serie_id' => 3,
            'socket_id' => 5,
            'name' => 'AMD Ryzen 7 3700X',
            'image' => 'ryzen-7-3700X.jpg',
            'price' => 329.00,
            'core_count' => 8,
            'core_clock' => 3.6,
            'boost_clock' => 4.4,
            'tdp' => 65,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // AMD Ryzen 5 3600XT
        Cpu::create([
            'manufacturer_id' => 1,
            'serie_id' => 2,
            'socket_id' => 5,
            'name' => 'AMD Ryzen 5 3600XT',
            'image' => 'ryzen-5-3600XT.jpg',
            'price' => 249.00,
            'core_count' => 6,
            'core_clock' => 3.8,
            'boost_clock' => 4.4,
            'tdp' => 95,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // AMD Ryzen 5 3600X
        Cpu::create([
            'manufacturer_id' => 1,
            'serie_id' => 2,
            'socket_id' => 5,
            'name' => 'AMD Ryzen 5 3600X',
            'image' => 'ryzen-5-3600X.jpg',
            'price' => 249.00,
            'core_count' => 6,
            'core_clock' => 3.8,
            'boost_clock' => 4.4,
            'tdp' => 95,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // AMD Ryzen 5 3600
        Cpu::create([
            'manufacturer_id' => 1,
            'serie_id' => 2,
            'socket_id' => 5,
            'name' => 'AMD Ryzen 5 3600',
            'image' => 'ryzen-5-3600.jpg',
            'price' => 199.00,
            'core_count' => 6,
            'core_clock' => 3.6,
            'boost_clock' => 4.2,
            'tdp' => 65,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // AMD Ryzen 3 3300X
        Cpu::create([
            'manufacturer_id' => 1,
            'serie_id' => 1,
            'socket_id' => 5,
            'name' => 'AMD Ryzen 3 3300X',
            'image' => 'ryzen-3-3300X.jpg',
            'price' => 119.00,
            'core_count' => 4,
            'core_clock' => 3.8,
            'boost_clock' => 4.3,
            'tdp' => 65,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // AMD Ryzen 3 3100
        Cpu::create([
            'manufacturer_id' => 1,
            'serie_id' => 1,
            'socket_id' => 5,
            'name' => 'AMD Ryzen 3 3100',
            'image' => 'ryzen-3-3100.jpg',
            'price' => 99.00,
            'core_count' => 4,
            'core_clock' => 3.6,
            'boost_clock' => 3.9,
            'tdp' => 65,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        

        

        

        

        // Intel Core i9-9900KS
        Cpu::create([
            'manufacturer_id' => 2,
            'serie_id' => 9,
            'socket_id' => 2,
            'name' => 'Intel Core i9-9900KS',
            'image' => 'i9-9900KS.jpg',
            'price' => 1925.00,
            'core_count' => 8,
            'core_clock' => 4,
            'boost_clock' => 5.0,
            'tdp' => 127,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);
        
        // Intel Core i9-9900KF
        Cpu::create([
            'manufacturer_id' => 2,
            'serie_id' => 9,
            'socket_id' => 2,
            'name' => 'Intel Core i9-9900KF',
            'image' => 'i9-9900KF.jpg',
            'price' => 490.00,
            'core_count' => 8,
            'core_clock' => 3.6,
            'boost_clock' => 5.0,
            'tdp' => 95,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => false,
        ]);

        // Intel Core i9-9900K
        Cpu::create([
            'manufacturer_id' => 2,
            'serie_id' => 9,
            'socket_id' => 2,
            'name' => 'Intel Core i9-9900K',
            'image' => 'i9-9900K.jpg',
            'price' => 689.90,
            'core_count' => 8,
            'core_clock' => 3.6,
            'boost_clock' => 5.0,
            'tdp' => 95,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // Intel Core i9-9900
        Cpu::create([
            'manufacturer_id' => 2,
            'serie_id' => 9,
            'socket_id' => 2,
            'name' => 'Intel Core i9-9900',
            'image' => 'i9-9900.jpg',
            'price' => 499.00,
            'core_count' => 8,
            'core_clock' => 3.1,
            'boost_clock' => 5.0,
            'tdp' => 65,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // Intel Core i7-9700KF
        Cpu::create([
            'manufacturer_id' => 2,
            'serie_id' => 8,
            'socket_id' => 2,
            'name' => 'Intel Core i7-9700KF',
            'image' => 'i7-9700kf.jpg',
            'price' => 477.00,
            'core_count' => 8,
            'core_clock' => 3.6,
            'boost_clock' => 4.9,
            'tdp' => 95,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => false,
        ]);

        // Intel Core i7-9700K
        Cpu::create([
            'manufacturer_id' => 2,
            'serie_id' => 8,
            'socket_id' => 2,
            'name' => 'Intel Core i7-9700K',
            'image' => 'i7-9700k.jpg',
            'price' => 479.00,
            'core_count' => 8,
            'core_clock' => 3.6,
            'boost_clock' => 4.9,
            'tdp' => 95,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // Intel Core i7-9700F
        Cpu::create([
            'manufacturer_id' => 2,
            'serie_id' => 8,
            'socket_id' => 2,
            'name' => 'Intel Core i7-9700F',
            'image' => 'i7-9700f.jpg',
            'price' => 399.00,
            'core_count' => 8,
            'core_clock' => 3.0,
            'boost_clock' => 4.7,
            'tdp' => 65,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => false,
        ]);

        // Intel Core i7-9700
        Cpu::create([
            'manufacturer_id' => 2,
            'serie_id' => 8,
            'socket_id' => 2,
            'name' => 'Intel Core i7-9700',
            'image' => 'i7-9700.jpg',
            'price' => 399.00,
            'core_count' => 8,
            'core_clock' => 3.0,
            'boost_clock' => 4.7,
            'tdp' => 65,
            'smt' => true,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // Intel Core i5-9600KF
        Cpu::create([
            'manufacturer_id' => 2,
            'serie_id' => 7,
            'socket_id' => 2,
            'name' => 'Intel Core i5-9600',
            'image' => 'i5-9600.jpg',
            'price' => 240.00,
            'core_count' => 6,
            'core_clock' => 3.1,
            'boost_clock' => 4.6,
            'tdp' => 95,
            'smt' => false,
            'has_cooler' => false,
            'integrated_graphics' => false,
        ]);

        // Intel Core i5-9600K
        Cpu::create([
            'manufacturer_id' => 2,
            'serie_id' => 7,
            'socket_id' => 2,
            'name' => 'Intel Core i5-9600KF',
            'image' => 'i5-9600kf.jpg',
            'price' => 260.00,
            'core_count' => 6,
            'core_clock' => 3.1,
            'boost_clock' => 4.6,
            'tdp' => 95,
            'smt' => false,
            'has_cooler' => false,
            'integrated_graphics' => true,
        ]);

        // Intel Core i5-9600
        Cpu::create([
            'manufacturer_id' => 2,
            'serie_id' => 7,
            'socket_id' => 2,
            'name' => 'Intel Core i5-9600',
            'image' => 'i5-9600.jpg',
            'price' => 300.00,
            'core_count' => 6,
            'core_clock' => 3.1,
            'boost_clock' => 4.6,
            'tdp' => 95,
            'smt' => false,
            'has_cooler' => true,
            'integrated_graphics' => true,
        ]);

        // Intel Core i5-9400F
        Cpu::create([
            'manufacturer_id' => 2,
            'serie_id' => 7,
            'socket_id' => 2,
            'name' => 'Intel Core i5-9400F',
            'image' => 'i5-9400f.jpg',
            'price' => 150.90,
            'core_count' => 6,
            'core_clock' => 2.9,
            'boost_clock' => 4.1,
            'tdp' => 65,
            'smt' => false,
            'has_cooler' => false,
            'integrated_graphics' => false,
        ]);

        // Intel Core i5-9400
        Cpu::create([
            'manufacturer_id' => 2,
            'serie_id' => 7,
            'socket_id' => 2,
            'name' => 'Intel Core i5-9400',
            'image' => 'i5-9400.jpg',
            'price' => 240.00,
            'core_count' => 6,
            'core_clock' => 2.9,
            'boost_clock' => 4.1,
            'tdp' => 65,
            'smt' => false,
            'has_cooler' => true,
            'integrated_graphics' => true,
        ]);

        // Intel Core i3-9300
        Cpu::create([
            'manufacturer_id' => 2,
            'serie_id' => 6,
            'socket_id' => 2,
            'name' => 'Intel Core i3-9300',
            'image' => 'i3-9300.jpg',
            'price' => 155.00,
            'core_count' => 4,
            'core_clock' => 3.7,
            'boost_clock' => 4.3,
            'tdp' => 62,
            'smt' => false,
            'has_cooler' => true,
            'integrated_graphics' => true,
        ]);
        
        // Intel Core i3-9100F
        Cpu::create([
            'manufacturer_id' => 2,
            'serie_id' => 6,
            'socket_id' => 2,
            'name' => 'Intel Core i3-9100F',
            'image' => 'i3-9100f.jpg',
            'price' => 115.00,
            'core_count' => 4,
            'core_clock' => 3.6,
            'boost_clock' => 4.2,
            'tdp' => 65,
            'smt' => false,
            'has_cooler' => false,
            'integrated_graphics' => false,
        ]);

        // Intel Core i3-9100
        Cpu::create([
            'manufacturer_id' => 2,
            'serie_id' => 6,
            'socket_id' => 2,
            'name' => 'Intel Core i3-9100',
            'image' => 'i3-9100.jpg',
            'price' => 155.00,
            'core_count' => 4,
            'core_clock' => 3.6,
            'boost_clock' => 4.2,
            'tdp' => 65,
            'smt' => false,
            'has_cooler' => true,
            'integrated_graphics' => true,
        ]);        
    }
}
