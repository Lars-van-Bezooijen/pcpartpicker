<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cpu;

class ProductsController extends Controller
{
    public function cpu_index()
    {

        $integrated_graphics = null;
        $cheapestCpu = Cpu::orderBy('price', 'asc')->first();
        $mostExpensiveCpu = Cpu::orderBy('price', 'desc')->first();


        if(isset($_GET['integrated_graphics'])) {$integrated_graphics = $_GET['integrated_graphics'];}

        if(isset($integrated_graphics)) 
        {
            if($integrated_graphics == 'all') {
                $cpus = Cpu::all();
            } else {
                $cpus = Cpu::where('integrated_graphics', $integrated_graphics)->get();
            }
        } 

        else 
        {
            $cpus = Cpu::all();
        }








        return view('products.cpu', [
            'cpus' => $cpus,
            'cheapestCpu' => $cheapestCpu,
            'mostExpensiveCpu' => $mostExpensiveCpu
        ]);
    }
}
