<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cpu;
use App\Models\CpuManufacturer;
use App\Models\CpuSeries;
use App\Models\CpuSockets;

class CpuController extends Controller
{
    //
    // CPU PRODUCT LIST
    //

    public function cpu_search()
    {
        // 
        // GET ALL NEEDED DATA
        //

        $query =  DB::table('cpus');

        // Get all manufacturers, series and sockets
        $manufacturers = CpuManufacturer::all();
        $series = CpuSeries::all();
        $sockets = CpuSockets::all();

        // Get cheapest and most expensive CPU prices
        $lowestPrice = Cpu::orderBy('price', 'asc')->first();
        $lowestPrice->price = floor($lowestPrice->price);
        $highestPrice = Cpu::orderBy('price', 'desc')->first();
        $highestPrice->price = ceil($highestPrice->price);

        // Get lowest and highest core count
        $lowestCoreCount = Cpu::orderBy('core_count', 'asc')->first();
        $highestCoreCount = Cpu::orderBy('core_count', 'desc')->first();

        // Get lowest and highest TDP
        $highestTdp = Cpu::orderBy('tdp', 'desc')->first();
        $lowestTdp = Cpu::orderBy('tdp', 'asc')->first();



        // 
        // ALL FILTERS
        //

        // Search filter
        if(checkGetRequest('search'))
        {
            $search = $_GET['search'];
            extendQueryWhere($query, 'name', 'LIKE', '%'.$search.'%');
        }








        //
        // Execute query
        //

        $cpus = $query->get();



        //
        // RETURN VIEW
        //

        return view('pages.cpu.search', [
            'cpus' => $cpus,

            'manufacturers' => $manufacturers,
            'series' => $series,
            'sockets' => $sockets,

            'lowestPrice' => $lowestPrice->price,
            'highestPrice' => $highestPrice->price,
            'lowestCoreCount' => $lowestCoreCount->core_count,
            'highestCoreCount' => $highestCoreCount->core_count,
            'lowestTdp' => $lowestTdp->tdp,
            'highestTdp' => $highestTdp->tdp,
            
        ]);
    }




    //
    // SHOW SPECIFIC CPU
    //

    public function cpu_show($id)
    {
        $cpu = Cpu::find($id);
        return view('pages.cpu.show', [
            'cpu' => $cpu
        ]);
    }

}



// Function to check if GET request is set
function checkGetRequest($name)
{
    if(isset($_GET[$name]))
    {
        return $_GET[$name];
    }
    else
    {
        return null;
    }
}

// Function to extend the sql query with a new filter
function extendQueryWhere($query, $name, $operator, $value)
{
    $query = $query->where($name, $operator, $value);
    return $query;
}


