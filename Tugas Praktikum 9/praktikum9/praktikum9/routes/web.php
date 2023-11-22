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


// Menampilkan daftar produk
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// Menampilkan form tambah produk
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Menyimpan produk baru
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Menampilkan detail produk
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Menampilkan form edit produk
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Mengupdate produk
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Menghapus produk
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');   

Route::get('/category/{category}', [ProductController::class, 'productsByCategory'])->name('category.products');
