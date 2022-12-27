<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CpuSeries;

class CpuSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $series = [
            "AMD Ryzen 3",
            "AMD Ryzen 5",
            "AMD Ryzen 7",
            "AMD Ryzen 9",
            "AMD Threadripper",
            "Intel Core i3",
            "Intel Core i5",
            "Intel Core i7",
            "Intel Core i9",
        ];

        foreach ($series as $serie) {
            CpuSeries::create([
                'name' => $serie,
            ]);
        }
    }
}
