<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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


// get() digunakan untuk mengatur rute yang akan menangani permintaan GET ke URL tertentu
// Parameter pertama adalah URL yang akan ditangani
// parameter kedua adalah array yang berisi nama kelas kontroler dan metode yang akan menangani permintaan tersebut
// name() untuk memberikan nama pada setiap rute


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Home",
        "welcome" => "Selamat Datang di Classic Models"
    ]);
});

// route -> class
// :: mengambil method static
// get method request
Route::get('/product', [ProductController::class, 'index']);

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

// {productName} -> jdi parameter di fungsi showProduct
Route::get('/products/{productName}', [ProductController::class, 'showProduct'])->name('products.show');

Route::get('/productlines', function () {
    return view('productlines', [
        "title" => "Product Lines"
    ]);
});