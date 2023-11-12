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

// Route localhost/product akan menampilkan seluruh data productName, productLine, productVendor dan quantityInStock pada tabel produtcs
// Route localhost/product/{productLine} akan menampilkan seluruh produk yang kolom productLine-nya sama dengan yang dimasukan


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('home', [
//         "title" => "Home",
//         "welcome" => "Selamat Datang di Classic Models"
//     ]);
// });

// Route::get('/product', function () {
//     return view('product', [
//         "title" => "Product"
//     ]);
// });
Route::get('/home', function () {
    return view('home', [
        "title" => "Home",
        "welcome" => "Selamat Datang di Classic Models"
    ]);
});

Route::get('/product', function () {
    return view('product', [
        "title" => "Product",
        "intro" => "Products of Classic Models"
    ]);
});

Route::get('/product', [ProductController::class, 'index']);
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

Route::get('/products/{productName}', [ProductController::class, 'showProduct'])->name('products.show');

Route::get('/productlines', function () {
    return view('productlines', [
        "title" => "Product Lines"
    ]);
});

// title halaman
// show product -> value desc & harga ecer
