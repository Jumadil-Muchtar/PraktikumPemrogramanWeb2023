<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\wargaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home');
});
Route::get('/index',[wargaController::class,'index']);
Route::get('/create',[wargaController::class,'create']);
Route::post('/store',[wargaController::class,'store']);
Route::get('/{id}/edit',[wargaController::class,'edit']);
Route::put('/{id}',[wargaController::class,'update']);
Route::delete('/{id}',[wargaController::class,'delete']);
Route::get('/search', [wargaController::class, 'search'])->name('alamat.search');