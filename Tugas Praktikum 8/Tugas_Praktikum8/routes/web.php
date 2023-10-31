<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
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
Route::get('/product',[productController::class, 'readAll']);
Route::get('/product/Motorcycles',[productController::class, 'readMotorcycles']);
Route::get('/product/ClassicCars',[productController::class, 'readClassicCars']);
Route::get('/product/Planes',[productController::class, 'readPlanes']);
Route::get('/product/Trains',[productController::class, 'readTrains']);
Route::get('/product/Ships',[productController::class, 'readShips']);
Route::get('/product/TrucksBuses',[productController::class, 'readTrucksBuses']);
Route::get('/product/VintageCars',[productController::class, 'readVintageCars']);
Route::get('/product/{productCode}',[productController::class, 'detaildata'])->name('readDetail');

