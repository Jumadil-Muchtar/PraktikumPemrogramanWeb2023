<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/{id}', [App\Http\Controllers\HomeController::class, 'Profile'])->middleware('role')->name('profile');

Route::get('/admin_home', function () {
    if (Auth::check() && Auth::user()->role !== 'admin') {
        abort(403, 'yahh kamu bukan admin:(.');
    }

    return view('dashboard');
})->middleware('auth')->name('admin_home');

Route::get('/homepage', function () {
    return view('homepage');
});

// Driver Route
Route::group(['middleware' => 'admin'], function () {
    // Routes that only admins can access
    Route::get('/drivers', [App\Http\Controllers\DriverController::class, 'index'])->name('drivers.index');
    Route::get('/drivers/create', [App\Http\Controllers\DriverController::class, 'create'])->name('drivers.create');
    Route::post('/drivers', [App\Http\Controllers\DriverController::class, 'store'])->name('drivers.store');
    Route::get('/drivers/{id}/edit', [App\Http\Controllers\DriverController::class, 'edit'])->name('drivers.edit');
    Route::put('/drivers/{id}', [App\Http\Controllers\DriverController::class, 'update'])->name('drivers.update');
    Route::delete('/drivers/{id}', [App\Http\Controllers\DriverController::class, 'destroy'])->name('drivers.destroy');
});

// Users controller
Route::group(['middleware' => 'admin'], function () {
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
Route::get('/users/create', [App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
Route::post('/users/store', [App\Http\Controllers\UsersController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{id}', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
Route::delete('/users/delete/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.destroy');
});

// Payment controller
Route::group(['middleware' => 'admin'], function () {
Route::get('/payments', [App\Http\Controllers\PaymentController::class, 'index'])->name('payments.index');
Route::get('/payments/create', [App\Http\Controllers\PaymentController::class, 'create'])->name('payments.create');
Route::post('/payments/store', [App\Http\Controllers\PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments/edit/{id}', [App\Http\Controllers\PaymentController::class, 'edit'])->name('payments.edit');
Route::put('/payments/update/{id}', [App\Http\Controllers\PaymentController::class, 'update'])->name('payments.update');
});
// Penyewa Index
Route::get('/payments1', [App\Http\Controllers\PaymentController::class, 'index1'])->name('payments1.index');
Route::post('/payments1/store', [App\Http\Controllers\PaymentController::class, 'store1'])->name('payments1.store');


// Rental controller
Route::group(['middleware' => 'admin'], function () {
Route::get('/rentals', [App\Http\Controllers\RentalController::class, 'index'])->name('rentals.index');
Route::get('/rentals/create', [App\Http\Controllers\RentalController::class, 'create'])->name('rentals.create');
Route::get('/rentals/alert', [App\Http\Controllers\RentalController::class, 'alert'])->name('rentals.alert');
Route::post('/rentals/store', [App\Http\Controllers\RentalController::class, 'store'])->name('rentals.store');
});

// Rental Penyewa
Route::get('/rentals1', [App\Http\Controllers\RentalController::class, 'index1'])->name('rentals1.index');
Route::get('/rentals1/create', [App\Http\Controllers\RentalController::class, 'create1'])->name('rentals1.create');
Route::get('/rentals1/alert', [App\Http\Controllers\RentalController::class, 'alert1'])->name('rentals1.alert');
Route::post('/rentals1/store', [App\Http\Controllers\RentalController::class, 'store1'])->name('rentals1.store');


// Car Route
Route::group(['middleware' => 'admin'], function () {
Route::get('/cars', [App\Http\Controllers\CarController::class, 'index'])->name('cars.index');
Route::get('/cars/create', [App\Http\Controllers\CarController::class, 'create'])->name('cars.create');
Route::post('/cars/store', [App\Http\Controllers\CarController::class, 'store'])->name('cars.store');
Route::get('/cars/{id}', [App\Http\Controllers\CarController::class, 'show'])->name('cars.show');
Route::get('/cars/{id}/edit', [App\Http\Controllers\CarController::class, 'edit'])->name('cars.edit');
Route::put('/cars/{id}', [App\Http\Controllers\CarController::class, 'update'])->name('cars.update');
Route::delete('/cars/{id}', [App\Http\Controllers\CarController::class, 'destroy'])->name('cars.destroy');
});

Route::get('/cars1', [App\Http\Controllers\CarController::class, 'index1'])->name('cars1.index');

// Users Route
Route::group(['middleware' => 'admin'], function () {
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
});

// error
Route::get('/error', function () {
    abort(403, 'Maaf yaa, fitur ini gabisa di pake hehe');
})->name('error');
