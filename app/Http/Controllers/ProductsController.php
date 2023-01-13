<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cpu;

class ProductsController extends Controller
{
    public function cpu_index()
    {

        $integrated_graphics = null;
        $smt = null;
        $price_min = null;
        $price_max = null;
        $core_min = null;
        $core_max = null;
        $tdp_min = null;
        $tdp_max = null;

        // Get Cheapest and Most Expensive CPU Prices
        $cheapestCpu = Cpu::orderBy('price', 'asc')->first();
        // round down to full dollar
        $cheapestCpu->price = floor($cheapestCpu->price);
        $mostExpensiveCpu = Cpu::orderBy('price', 'desc')->first();
        // round up to full dollar
        $mostExpensiveCpu->price = ceil($mostExpensiveCpu->price);

        $lowestCoreCount = Cpu::orderBy('core_count', 'asc')->first();
        $highestCoreCount = Cpu::orderBy('core_count', 'desc')->first();

        $highestTdp = Cpu::orderBy('tdp', 'desc')->first();
        $lowestTdp = Cpu::orderBy('tdp', 'asc')->first();

        // Search Filter
        if(isset($_GET['search']))
        {
            $search = $_GET['search'];
            $filters[] = ['name', 'like', '%'.$search.'%'];
        }

        // Price Filter
        if(isset($_GET['price_min'])) {$price_min = $_GET['price_min'];}
        if(isset($_GET['price_max'])) {$price_max = $_GET['price_max'];}

        if($price_min != null && $price_max != null)
        {
            $filters[] = ['price', '>=', $price_min];
            $filters[] = ['price', '<=', $price_max];
        }

        // Core Count Filter
        if(isset($_GET['core_min'])) {$core_min = $_GET['core_min'];}
        if(isset($_GET['core_max'])) {$core_max = $_GET['core_max'];}

        if($core_min != null && $core_max != null)
        {
            $filters[] = ['core_count', '>=', $core_min];
            $filters[] = ['core_count', '<=', $core_max];
        }

        // TDP Filter
        if(isset($_GET['tdp_min'])) {$tdp_min = $_GET['tdp_min'];}
        if(isset($_GET['tdp_max'])) {$tdp_max = $_GET['tdp_max'];}

        if($tdp_min != null && $tdp_max != null)
        {
            $filters[] = ['tdp', '>=', $tdp_min];
            $filters[] = ['tdp', '<=', $tdp_max];
        }

        // Integrated Graphics Filter
        if(isset($_GET['integrated_graphics'])) {$integrated_graphics = $_GET['integrated_graphics'];}

        if($integrated_graphics == '1' || $integrated_graphics == '0')
        {
            $filters[] = ['integrated_graphics', '=', $integrated_graphics];
        } 

        // SMT Filter
        if(isset($_GET['smt'])) {$smt = $_GET['smt'];}

        if($smt == '1' || $smt == '0')
        {
            $filters[] = ['smt', '=', $smt];
        }

        // SQL Query
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
            'cheapestCpu' => $cheapestCpu->price,
            'mostExpensiveCpu' => $mostExpensiveCpu->price,
            'lowestCoreCount' => $lowestCoreCount->core_count,
            'highestCoreCount' => $highestCoreCount->core_count,
            'highestTdp' => $highestTdp->tdp,
            'lowestTdp' => $lowestTdp->tdp,
        ]);
    }
}
