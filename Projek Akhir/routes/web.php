<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [ProductController::class, 'homepage'])->name('homepage');

Route::get('Dashboard', [ProductController::class, 'product'])->name('product');
Route::get('/product/{id}', [ProductController::class, 'productdetails'])->name('product.details');
Route::get('/addproduct', [ProductController::class, 'addproduct'])->name('addproduct');
Route::post('/storeproduct', [ProductController::class, 'storeproduct'])->name('storeproduct');


// Route::get('adminusers', function () {
//     return view('admin.users');
// });
Route::get('adminusers', [UserController::class, 'user'])->name('user');
Route::get('/adduser', [UserController::class, 'adduser'])->name('adduser');
Route::post('/storeuser', [UserController::class, 'storeuser'])->name('storeuser');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('buyer', function () {
//     return view('index')->name('homepage');
// })->middleware(['auth', 'verified', 'role:buyer']);

Route::get('/editproduct/{id}', [ProductController::class, 'editproduct'])->name('editproduct');
Route::patch('/updateproduct/{id}', [ProductController::class, 'updateproduct'])->name('updateproduct');
Route::delete('/deleteproduct/{id}', [ProductController::class, 'deleteproduct'])->name('deleteproduct');

Route::get('/edituser/{id}', [UserController::class, 'edituser'])->name('edituser');
Route::patch('/updateuser/{id}', [UserController::class, 'updateuser'])->name('updateuser');
Route::delete('/deleteuser/{id}', [UserController::class, 'deleteuser'])->name('deleteuser');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/user/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/user/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
