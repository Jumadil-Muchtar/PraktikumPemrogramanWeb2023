<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakeupProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::resource('makeup-products', MakeupProductController::class);
//ini untuk crud nya 


// Route::get('/makeup-products', [MakeupProductController::class, 'index'])->name('makeup-products.index');
// Menampilkan daftar semua produk (index) menggunakan metode index pada MakeupProductController

