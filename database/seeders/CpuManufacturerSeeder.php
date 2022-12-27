<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CpuManufacturer;

class CpuManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufacturers = [
            "AMD",
            "Intel",
        ];

        foreach ($manufacturers as $manufacturer) {
            CpuManufacturer::create([
                'name' => $manufacturer,
            ]);
        }
    }
}
