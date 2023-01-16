<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        // Set variables
        $price_min = null;
        $price_max = null;
        $core_min = null;
        $core_max = null;
        $tdp_min = null;
        $tdp_max = null;
        $manufacturer = null;
        $filterRadioValue = null;

        // Get all manufacturers, series and sockets
        $manufacturers = CpuManufacturer::all();
        $series = CpuSeries::all();
        $sockets = CpuSockets::all();

        // Get cheapest and most expensive CPU prices
        $cheapestCpu = Cpu::orderBy('price', 'asc')->first();
        $cheapestCpu->price = floor($cheapestCpu->price);
        $mostExpensiveCpu = Cpu::orderBy('price', 'desc')->first();
        $mostExpensiveCpu->price = ceil($mostExpensiveCpu->price);

        // Get lowest and highest core count
        $lowestCoreCount = Cpu::orderBy('core_count', 'asc')->first();
        $highestCoreCount = Cpu::orderBy('core_count', 'desc')->first();

        // Get lowest and highest TDP
        $highestTdp = Cpu::orderBy('tdp', 'desc')->first();
        $lowestTdp = Cpu::orderBy('tdp', 'asc')->first();



        // 
        // ALL FILTERS
        //

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






        // Checkbox filters
        $checkboxFilters = [
            'manufacturer' => $manufacturers,
            'serie' => $series,
            'socket' => $sockets,
        ];


        // Series Filter
        if(isset($_GET['serie'])) 
        {
            $serie = $_GET['serie'];

            // Loop through serie array and add to filters array
            foreach($serie as $s)
            {
                if($s == 'all')
                {
                    // Add all serie ids to array if 'all'
                    foreach($series as $s)
                    {
                        $s_array[] = $s->id;
                    }
                    break;
                }
                else
                {
                    $s_array[] = $s;                    
                }
            }
        }
        
        // Manufacturer Filter
        if(isset($_GET['manufacturer'])) 
        {
            $manufacturer = $_GET['manufacturer'];

            // Loop through manufacturer array and add to filters array
            foreach($manufacturer as $m)
            {
                if($m == 'all')
                {
                    // Add all manufacturer ids to array if 'all'
                    foreach($manufacturers as $m)
                    {
                        $m_array[] = $m->id;
                    }
                    break;
                }
                else
                {
                    $m_array[] = $m;                    
                }
            }
        }

        

        // Sockets Filter
        if(isset($_GET['socket'])) 
        {
            $socket = $_GET['socket'];

            // Loop through socket array and add to filters array
            foreach($socket as $s)
            {
                if($s == 'all')
                {
                    // Add all socket ids to array if 'all'
                    foreach($sockets as $s)
                    {
                        $sckt_array[] = $s->id;
                    }
                    break;
                }
                else
                {
                    $sckt_array[] = $s;                    
                }
            }
        }

        // Radio Filters
        $radioFilters = [
            'smt', 
            'integrated_graphics',
        ];

        foreach($radioFilters as $filter)
        {
            if(isset($_GET[$filter])) {$filterRadioValue = $_GET[$filter];}

            if($filterRadioValue == '1' || $filterRadioValue == '0')
            {
                $filters[] = [$filter, '=', $filterRadioValue];
            }
        }



        //
        // PREPARING SQL QUERY
        //

        if(isset($filters))
        {
            $cpus = Cpu::where($filters)
                ->whereIn('manufacturer_id', $m_array)
                ->whereIn('series_id', $s_array)
                ->whereIn('socket_id', $sckt_array)
                ->orderBy('created_at', 'desc')
                ->get();
        }   
        else{ $cpus = Cpu::all(); }



        //
        // RETURN VIEW
        //

        return view('pages.cpu.search', [
            'cpus' => $cpus,

            'manufacturers' => $manufacturers,
            'series' => $series,
            'sockets' => $sockets,

            'cheapestCpu' => $cheapestCpu->price,
            'mostExpensiveCpu' => $mostExpensiveCpu->price,
            'lowestCoreCount' => $lowestCoreCount->core_count,
            'highestCoreCount' => $highestCoreCount->core_count,
            'highestTdp' => $highestTdp->tdp,
            'lowestTdp' => $lowestTdp->tdp,
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
