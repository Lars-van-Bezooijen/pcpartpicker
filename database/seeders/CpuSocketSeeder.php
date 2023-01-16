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
               "LGA 1150",
               "LGA 1151",
               "LGA 1200",
               "LGA 1700",
               "Zen 2",
          ]; 

          foreach ($sockets as $socket) {
               CpuSockets::create([
                    'name' => $socket,
               ]);
          }
     }
}
