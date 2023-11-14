<?php

use App\Http\Controllers\productController;
use App\Models\product;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [productController::class, 'get_all_products']);
Route::get('/products/{value}', [productController::class, 'get_details']);
Route::get('/product/{value}', [productController::class, 'get_product']);// route memberikan jalan ke url menggunakan controller
