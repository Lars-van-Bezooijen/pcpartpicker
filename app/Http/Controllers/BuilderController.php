<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cpu;

class BuilderController extends Controller
{
    // Show Builder
    public function builder()
    {
        $sessionProducts = session()->get('builderProducts');
        $sessionProducts = json_decode($sessionProducts, true);
        
        return view('pages.builder.builder', [
            'sessionProducts' => $sessionProducts
        ]);
    }

    // Add CPU to Session
    public function cpu_add($id)
    {
        $cpu = Cpu::find($id);
        $sessionProducts = session()->get('builderProducts');
        $sessionProducts = json_decode($sessionProducts, true);
        $sessionProducts['cpu'] = $cpu;
        $sessionProducts = json_encode($sessionProducts);
        session()->put('builderProducts', $sessionProducts);
        return redirect()->route('builder');
    }

    // Remove CPU from Session
    public function cpu_remove()
    {
        $sessionProducts = session()->get('builderProducts');
        $sessionProducts = json_decode($sessionProducts, true);
        $sessionProducts['cpu'] = null;
        $sessionProducts = json_encode($sessionProducts);
        session()->put('builderProducts', $sessionProducts);
        return redirect()->route('builder');
    }
}
