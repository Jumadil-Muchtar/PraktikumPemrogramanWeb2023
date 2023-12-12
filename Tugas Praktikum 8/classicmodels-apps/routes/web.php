<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductLineControllers;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome', [
        "title" => "Home"
    ]);
});
Route::get('/product', [ProductController::class, 'showAllProduct']);
Route::get('/product/details/{id}', [ProductController::class, 'showByProductCode']);
Route::get('product/line/{product:productLine}', [ProductController::class, 'showByProductLine']);
Route::get('/customers', [CustomerController::class, 'showCustomers']);
Route::get('/offices', [OfficeController::class, 'showOffices']);
Route::get('/employees', [EmployeeController::class, 'showEmployees']);
Route::get('/orders', [OrderController::class, 'showOrders']);
Route::get('/orderDetails', [OrderDetailController::class, 'showOrderDetails']);
Route::get('/payments', [PaymentController::class, 'showPayments']);
Route::get('/productLine', [ProductLineControllers::class, 'showProductLine']);


