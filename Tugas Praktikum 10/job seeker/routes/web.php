<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerJob;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;



Route::middleware(['web'])->group(function (){
    // Route Landing Page
    Route::get('/', function () {
        return view('landingPage.index');
    });
    Route::get('/sign-up', function () {
        return view('landingPage.signup');
    });
    Route::post('/addUser', [ControllerJob::class, 'addUser']);
    Route::get('/', [ControllerJob::class, 'index']);

    Route::get('/job', [ControllerJob::class, 'listJob']);

    Route::get('/login', function () {
        return view('landingPage.login');
    })->name('login');


    
    Route::get('/search/{job}', [ControllerJob:: class , 'search'])->name('job.search');
    Route::get('/search', [ControllerJob::class, 'search'])->name('job.search');

    Route::post('/LoginUser', [AuthController::class, 'LoginUser']);
});

// Route User
Route::middleware(['auth:user'])->group(function () {
    Route::get('/logUser/{id}', [ControllerJob::class, 'logUser']);
    Route::get('/profil/{id}', [ControllerJob::class, 'showProfil']);
    Route::post('/updateProfil/{id}', [ControllerJob::class, 'EditProfil']);
    Route::post('/applyJob/{id}', [ControllerJob::class, 'applyJobUser']);
    Route::get('/detailJob/{id}', [ControllerJob::class, 'detailJob']);
});

// Rute Master Admin
Route::middleware(['auth:admin'])->group(function (){
    Route::get('/dashboardAdmin', [AdminController::class, 'dashboard'])->name('dashboardAdmin');
    Route::get('/adminJob', [AdminController::class, 'dataJob']);
    Route::post('/addJob', [AdminController::class, 'addJob']);
    Route::post('/editJob/{id}', [AdminController::class, 'editJob']);
    Route::post('/deleteJob/{id}', [AdminController::class, 'deleteJob']);
    Route::post('/sendEmail/{id}', [AdminController::class, 'infoInterview']);
    Route::get('/apply', [AdminController::class, 'applyJob'])->name('pelamar.show');
    Route::get('/download-berkas/{id}', [AdminController::class, 'downloadBerkas'])->name('download-berkas');
});

// Rute untuk logout, dapat diakses oleh semua pengguna (tanpa middleware)
Route::get('/LogoutUser', [AuthController::class, 'LogoutUser']);
Route::get('/LogoutAdmin', [AuthController::class, 'LogoutAdmin']);
Route::get('/check-login', [ControllerJob::class, 'checkLoginStatus']);


