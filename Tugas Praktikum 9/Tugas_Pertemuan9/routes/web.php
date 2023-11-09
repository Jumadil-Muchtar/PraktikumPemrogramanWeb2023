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
// */
Route::get('/product', [ProductController::class, 'index'])->name('readProduct');
Route::get('/product/{details}', [ProductController::class, 'details'])->name('details');

Route::get('/create', [ProductController::class, 'create'])->name('create');
Route::post('/create', [ProductController::class, 'simpanCreate']);

Route::get('/update', [ProductController::class, 'update'])->name('update');
Route::post('/update', [ProductController::class, 'simpanUpdate']);

Route::get('/delete', [ProductController::class, 'delete'])->name('delete');
Route::post('/delete', [ProductController::class, 'simpanDelete']);

// Route::post('/create');
// Route::get('/keterangan', [ProductController::class, 'create'])->name('keterangan');
// Route::get('/create', [ProductController::class, 'create']);
// Route::post('/create', 'ProductController@create');

