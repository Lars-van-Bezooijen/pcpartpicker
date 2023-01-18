<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Stevebauman\Location\Facades\Location;
use App\Http\Controllers\BuilderController;
use App\Http\Controllers\CpuController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/builder', [BuilderController::class, 'builder'])->name('builder');

Route::get('/products/cpu', [CpuController::class, 'cpu_search'])->name('products.cpu.search');
Route::get('/products/cpu/create', [CpuController::class, 'cpu_create'])->name('products.cpu.create');
Route::post('/products/cpu/create', [CpuController::class, 'cpu_create_post'])->name('products.cpu.create_post');
Route::get('/products/cpu/{id}', [CpuController::class, 'cpu_show'])->name('products.cpu.show');

Route::get('/products/cpu/add/{id}', [BuilderController::class, 'cpu_add'])->name('builder.cpu.add');
Route::get('/products/cpu/remove/{id}', [BuilderController::class, 'cpu_remove'])->name('builder.cpu.remove');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $currentUserInfo = Location::get();
    $currentUserInfo = strtolower($currentUserInfo->countryCode);
    
    return view('test', [
        'currentUserInfo' => $currentUserInfo
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
