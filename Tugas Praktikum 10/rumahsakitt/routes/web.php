<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PharmacistController;

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
    
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

route::get('/home',[HomeController::class, 'index'])->middleware('auth')->name('home');

//ADMIN -DOKTER
#menampilkan halaman dokter
route::get('/doctor_data_view',[AdminController::class, 'doctorview'])->middleware('auth')->name('doctor');
#menampilkan halaman tambah dokter
Route::get('/create_doctor',[AdminController::class, 'createdoctor'])->middleware('auth')->name('create-doctor');
#untuk menambahkan dokter
Route::post('/upload_doctor', [AdminController::class, 'upload'])->middleware('auth')->name('upload.doctor');
#untuk edit
Route::get('/edit-doctor/{id}', [AdminController::class, 'editDoctor'])->name('edit-doctor');
Route::put('/update-doctor/{id}', [AdminController::class, 'updateDoctor'])->name('update-doctor');
#untuk menghapus data
Route::delete('delete-doctor/{id}', [AdminController::class, 'destroy'])->name('delete-doctor');

//ADMIN -APOTEKER
Route::get('/pharmacist_data_view',[AdminController::class, 'apotekerview'])->middleware('auth')->name('apoteker');
Route::get('/create_pharmacist',[AdminController::class, 'createpharmacist'])->middleware('auth')->name('create-pharmacist');
Route::post('/upload_pharmacist', [AdminController::class, 'uploadpharmacist'])->middleware('auth')->name('upload.pharmacist');
Route::get('/edit-pharmacist/{id}', [AdminController::class, 'editPharmacist'])->name('edit-pharmacist');
Route::put('/update-pharmacist/{id}', [AdminController::class, 'updatePharmacist'])->name('update-pharmacist');
Route::delete('delete-pharmacist/{id}', [AdminController::class, 'destroyPharmacist'])->name('delete-pharmacist');

//ADMIN -PASIEN
Route::get('/patient_data_view',[AdminController::class, 'pasienview'])->middleware('auth')->name('patient');
Route::get('/create_patient',[AdminController::class, 'createpatient'])->middleware('auth')->name('create-patient');
Route::post('/upload_patient', [AdminController::class, 'uploadpatient'])->middleware('auth')->name('upload.patient');
Route::get('/edit-patient/{id}', [AdminController::class, 'editPatient'])->name('edit-patient');
Route::put('/update-patient/{id}', [AdminController::class, 'updatePatient'])->name('update-patient');
Route::delete('delete-patient/{id}', [AdminController::class, 'destroyPatient'])->name('delete-patient');

//DOKTER -APPOINTMENT
route::get('/appointment_view',[DoctorController::class, 'appointmentview'])->middleware('auth')->name('appointment');
Route::get('/create_appointment',[DoctorController::class, 'createappointment'])->middleware('auth')->name('create-appointment');
Route::post('/upload_appointment', [DoctorController::class, 'uploadAppointment'])->middleware('auth')->name('upload.appointment');
Route::get('/edit-appointment/{id}', [DoctorController::class, 'editAppointment'])->name('edit-appointment');
Route::put('/update-appointment/{id}', [DoctorController::class, 'updateAppointment'])->name('update-appointment');
Route::delete('delete-appointment/{id}', [DoctorController::class, 'destroyappointment'])->name('delete-appointment');

//DOKTER -MEDICAL RECORDS
route::get('/medicalrecords_view',[DoctorController::class, 'medicalrecordsview'])->middleware('auth')->name('medicalrecords');
Route::get('/create_medicalrecords',[DoctorController::class, 'createmedicalrecords'])->middleware('auth')->name('create-medicalrecords');
Route::post('/upload_medicalrecords', [DoctorController::class, 'uploadmedicalrecords'])->middleware('auth')->name('upload.medicalrecords');
Route::get('/edit-medicalrecords/{id}', [DoctorController::class, 'editmedicalrecords'])->name('edit-medicalrecords');
Route::put('/update-medicalrecords/{id}', [DoctorController::class, 'updatemedicalrecords'])->name('update-medicalrecords');
Route::delete('delete-medicalrecords/{id}', [DoctorController::class, 'destroymedicalrecords'])->name('delete-medicalrecords');

//APOTEKER -MEDICINES
Route::get('/medicines_view',[PharmacistController::class, 'medicinesview'])->middleware('auth')->name('medicines');
Route::get('/create_medicines',[PharmacistController::class, 'createmedicines'])->middleware('auth')->name('create-medicines');
Route::post('/upload_medicines', [PharmacistController::class, 'uploadmedicines'])->middleware('auth')->name('upload.medicines');
Route::get('/edit-medicines/{id}', [PharmacistController::class, 'editmedicines'])->name('edit-medicines');
Route::put('/update-medicines/{id}', [PharmacistController::class, 'updatemedicines'])->name('update-medicines');
Route::delete('delete-medicines/{id}', [PharmacistController::class, 'destroymedicines'])->name('delete-medicines');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
