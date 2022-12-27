<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cpu;

class ProductsController extends Controller
{
    public function index()
    {
        $cpus = Cpu::all();
        return view('products.cpu', [
            'cpus' => $cpus
        ]);
    }
}
