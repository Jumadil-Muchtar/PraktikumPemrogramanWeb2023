<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { // mendefinisikan rute HTTP GET pada root path ('/')
    return view('home'); // Di dalam fungsi closure, rute ini mengembalikan tampilan dengan nama 'home'. Ini mengindikasikan bahwa ketika pengguna mengakses root path, aplikasi akan menampilkan tampilan dengan nama 'home'
})->name('home'); // memberikan nama rute, yaitu 'home', menggunakan metode name()

// Rute ini menangani permintaan HTTP GET pada path '/product'. Saat rute diakses, metode index pada ProductController akan dipanggil
Route::get('/product', [ProductController::class, 'index'])->name('product.index');

// Rute ini menangani permintaan HTTP GET pada path '/product/create'. Saat rute diakses, metode create pada ProductController akan dipanggil
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

// Rute ini menangani permintaan HTTP POST pada path '/product/store'. Saat rute diakses, metode store pada ProductController akan dipanggil
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

// Rute ini menangani permintaan HTTP GET pada path 'product/{id}/edit', di mana {id} adalah parameter dinamis. Saat rute diakses, metode edit pada ProductController akan dipanggil
Route::get('product/{id}/edit', [ProductController::class, 'edit']);

// Rute ini menangani permintaan HTTP PUT pada path 'product/{id}/update', di mana {id} adalah parameter dinamis. Saat rute diakses, metode update pada ProductController akan dipanggil
Route::put('product/{id}/update', [ProductController::class, 'update']);

// Rute ini menangani permintaan HTTP DELETE pada path 'product/{id}/delete', di mana {id} adalah parameter dinamis. Saat rute diakses, metode destroy pada ProductController akan dipanggil
Route::delete('product/{id}/delete', [ProductController::class, 'destroy']);

// Rute ini menangani permintaan HTTP GET pada path 'product/{id}/show', di mana {id} adalah parameter dinamis. Saat rute diakses, metode show pada ProductController akan dipanggil
Route::get('product/{id}/show', [ProductController::class, 'show']);

// Rute ini menangani permintaan HTTP GET pada path '/jenis'. Saat rute diakses, metode search pada ProductController akan dipanggil
Route::get('/jenis', [ProductController::class, 'search'])->name('jenis');