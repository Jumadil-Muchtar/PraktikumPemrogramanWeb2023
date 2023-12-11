<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProfileController;

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

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/lessonPage',  [ContentController::class, 'index2'])->name('contents.index2'); 

    Route::get('/progressTracking', [ContentController::class, 'index3'])->name('contents.index3'); 
    
    Route::get('/user-dashboard', [App\Http\Controllers\UserController::class, 'count2'])->name('user-dashboard'); 

    Route::get('/homepage', [App\Http\Controllers\CourseController::class, 'homepage'])->name('homepage');

    Route::get('/coursecatalog', [App\Http\Controllers\CourseController::class, 'coursecatalog'])->name('coursecatalog');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserController::class, 'index2'])->name('profile.index2');

    Route::get('/', function(){
        return view('home');
    });
});

// Route::middleware(['auth'])->group(function () {

//     // Course Management
//     Route::get('/courses', [CourseController::class, 'index'])->name('teacher.courses.index');
//     Route::get('/courses/create', [CourseController::class, 'create'])->name('teacher.courses.create');
//     Route::post('/courses', [CourseController::class, 'store'])->name('teacher.courses.store');
//     Route::get('/courses/{id}', [CourseController::class, 'show'])->name('teacher.courses.show');
//     Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('teacher.courses.edit');
//     Route::put('/courses/{id}', [CourseController::class, 'update'])->name('teacher.courses.update');
//     Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('teacher.courses.destroy');

//     // Content Management
//     Route::get('/contents', [ContentController::class, 'index'])->name('teacher.contents.index');
//     Route::get('/contents/create', [ContentController::class, 'create'])->name('teacher.contents.create');
//     Route::post('/contents', [ContentController::class, 'store'])->name('teacher.contents.store');
//     Route::get('/contents/{id}', [ContentController::class, 'show'])->name('teacher.contents.show');
//     Route::get('/contents/{id}/edit', [ContentController::class, 'edit'])->name('teacher.contents.edit');
//     Route::put('/contents/{id}', [ContentController::class, 'update'])->name('teacher.contents.update');
//     Route::delete('/contents/{id}', [ContentController::class, 'destroy'])->name('teacher.contents.destroy');


// });

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin-dashboard', [App\Http\Controllers\UserController::class, 'count'])->name('admin-dashboard');

    // User Management
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

// Route::middleware('auth', 'teacher', 'admin')->group(function () {
//     // Course Management
//     Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
//     Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
//     Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
//     Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
//     Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
//     Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
//     Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

//     // Content Management
//     Route::get('/contents', [ContentController::class, 'index'])->name('contents.index');
//     Route::get('/contents/create', [ContentController::class, 'create'])->name('contents.create');
//     Route::post('/contents', [ContentController::class, 'store'])->name('contents.store');
//     Route::get('/contents/{id}', [ContentController::class, 'show'])->name('contents.show');
//     Route::get('/contents/{id}/edit', [ContentController::class, 'edit'])->name('contents.edit');
//     Route::put('/contents/{id}', [ContentController::class, 'update'])->name('contents.update');
//     Route::delete('/contents/{id}', [ContentController::class, 'destroy'])->name('contents.destroy');
// });

Route::group(['middleware'=> 'teacher', 'admin'], function(){

    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

    // Content Management
    Route::get('/contents', [ContentController::class, 'index'])->name('contents.index');
    Route::get('/contents/create', [ContentController::class, 'create'])->name('contents.create');
    Route::post('/contents', [ContentController::class, 'store'])->name('contents.store');
    Route::get('/contents/{id}', [ContentController::class, 'show'])->name('contents.show');
    Route::get('/contents/{id}/edit', [ContentController::class, 'edit'])->name('contents.edit');
    Route::put('/contents/{id}', [ContentController::class, 'update'])->name('contents.update');
    Route::delete('/contents/{id}', [ContentController::class, 'destroy'])->name('contents.destroy');
});