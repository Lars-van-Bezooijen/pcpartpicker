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
        $manufacturers = CpuManufacturer::orderBy('name', 'asc')->get();
        $series = CpuSeries::orderBy('name', 'asc')->get();
        $sockets = CpuSockets::orderBy('name', 'asc')->get();

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

        // Slider filters
        $sliderFilters = [
            'price',
            'core_count',
            'tdp',
        ];

        foreach($sliderFilters as $filter)
        {
            if(checkGetRequest($filter.'_min'))
            {
                $min = $_GET[$filter.'_min'];
                extendQueryWhere($query, $filter, '>=', $min);
            }
            if(checkGetRequest($filter.'_max'))
            {
                $max = $_GET[$filter.'_max'];
                extendQueryWhere($query, $filter, '<=', $max);
            }
        }

        // Checkbox filters
        $checkboxFilters = [
            'manufacturer',
            'serie',
            'socket',
        ];

        foreach($checkboxFilters as $filter)
        {
            if(checkGetRequest($filter))
            {
                $currentFilter = $_GET[$filter];
                $currentFilterArray = [];

                foreach($currentFilter as $cf)
                {
                    $currentFilterArray[] = $cf;
                }

                if(!in_array('all', $currentFilterArray))
                {
                    extendQueryWhereIn($query, $filter.'_id', $currentFilterArray);
                }
            }
        }

        // Radio filters
        $radioFilters = [
            'smt',
            'integrated_graphics',
        ];

        foreach($radioFilters as $filter)
        {
            if(checkGetRequest($filter))
            {
                $value = $_GET[$filter];
                if($value == 'yes')
                {
                    extendQueryWhere($query, $filter, '=', 1);
                }
                else if($value == 'no')
                {
                    extendQueryWhere($query, $filter, '=', 0);
                }
            }
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
    if(isset($_GET[$name]) && $_GET[$name] != '')
    {
        return true;
    }
    else
    {
        return false;
    }
}
// -----------------------------------------------------------------------------

// Function to extend the sql query with a new filter
function extendQueryWhere($query, $name, $operator, $value)
{
    $query = $query->where($name, $operator, $value);
    return $query;
}

// -----------------------------------------------------------------------------

// Function to filter by array with whereIn
function extendQueryWhereIn($query, $column, $array)
{
    $query = $query->whereIn($column, $array);
    return $query;
}

// -----------------------------------------------------------------------------