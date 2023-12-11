<?php

use App\Http\Controllers\DotaController;
use App\Models\Dota;
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

Route::get('/', [DotaController::class, "index"])->name("hero");

Route::get('/viewhero/{id}', [DotaController::class,'viewhero'])->name('viewhero');

Route::get('/addhero', [DotaController::class, "addhero"])->name("addhero");
Route::post('/inserthero', [DotaController::class,'inserthero'])->name('inserthero');

Route::get('/edithero/{id}', [DotaController::class,'edithero'])->name('edithero');
Route::post('/updatehero/{id}', [DotaController::class,'updatehero'])->name('updatehero');

Route::get('/delete/{id}', [DotaController::class,'deletehero'])->name('deletehero');
