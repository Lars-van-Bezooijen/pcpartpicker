<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CpuSockets;

class CpuSocketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $sockets = [
            "AM3",
            "AM3+",
            "AM4",
            "AM5",
            "LGA 1150",
            "LGA 1200",
            "LGA 1700",
       ]; 

         foreach ($sockets as $socket) {
              CpuSockets::create([
                'name' => $socket,
              ]);
         }
    }
}
