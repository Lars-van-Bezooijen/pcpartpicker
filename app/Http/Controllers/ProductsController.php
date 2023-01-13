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

        // Integrated Graphics Filter
        if(isset($_GET['integrated_graphics'])) {$integrated_graphics = $_GET['integrated_graphics'];}

        if($integrated_graphics == '1' || $integrated_graphics == '0')
        {
            $filters[] = ['integrated_graphics', '=', $integrated_graphics];
        } 
        

        // Query Builder
        $cpus = "Cpu::";
        if(isset($filters))
        {
            $cpus = Cpu::where($filters)->get();
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
