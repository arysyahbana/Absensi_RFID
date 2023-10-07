<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\BkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Request;
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

Route::get('/', [DashboardController::class, 'show'])->name('dashboard')->middleware('auth');

// Signup
Route::middleware('auth')->group(function () {
    Route::get('/signup', [SignupController::class, 'signup'])->name('signup');
    Route::post('/signup-submit', [SignupController::class, 'signup_submit'])->name('signup-submit');
    Route::get('/signup/verification/{token}/{email}', [SignupController::class, 'signup_verification']);
});
// end Signup

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-submit', [LoginController::class, 'login_submit'])->name('login-submit');
Route::get('/forget-password', [LoginController::class, 'forget'])->name('forget');
Route::post('/forget-submit', [LoginController::class, 'forget_submit'])->name('forget-submit');
Route::get('/reset-password/{token}/{email}', [LoginController::class, 'reset'])->name('reset');
Route::post('/reset-submit', [LoginController::class, 'reset_submit'])->name('reset-submit');
// end Login

// Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// end Logout

Route::middleware('auth')->group(function () {
    // Absensi
    Route::get('/absensi/all', [AbsenController::class, 'show_absen'])->name('absen');
    Route::get('/absensi/tjkt', [AbsenController::class, 'show_absen_tkj'])->name('absen_tkj');
    Route::get('/absensi/tkr', [AbsenController::class, 'show_absen_tkr'])->name('absen_tkr');
    Route::get('/absensi/dpib', [AbsenController::class, 'show_absen_dpib'])->name('absen_dpib');
    Route::get('/absensi/titl', [AbsenController::class, 'show_absen_titl'])->name('absen_titl');
    // Route::get('/absensi/create', [AbsenController::class, 'create_absen'])->name('create-absen');
    // Route::post('/absensi/store', [AbsenController::class, 'add_absen'])->name('store-absen');
    Route::get('/absensi/edit/{id}', [AbsenController::class, 'edit_absen'])->name('edit-absen');
    Route::post('/absensi/update/{id}', [AbsenController::class, 'update_absen'])->name('update-absen');
    Route::get('/absensi/delete/{id}', [AbsenController::class, 'delete_absen'])->name('delete-absen');
    // end Absensi

    // Student
    Route::get('/siswa', [StudentController::class, 'show_student'])->name('student');
    Route::get('/siswa/create', [StudentController::class, 'create_student'])->name('create-student');
    Route::post('/siswa/store', [StudentController::class, 'store_student'])->name('store-student');
    Route::get('/siswa/edit/{id}', [StudentController::class, 'edit_student'])->name('edit-student');
    Route::post('/siswa/update/{id}', [StudentController::class, 'update_student'])->name('update-student');
    Route::get('/siswa/delete/{id}', [StudentController::class, 'delete_student'])->name('delete-student');
    Route::get('/kelas/naik-kelas', [StudentController::class, 'naik_kelas'])->name('naik_kelas');
    // end Student

    //Bimbingan Konseling
    Route::get('/bk', [BkController::class, 'show_bk'])->name('bk');
    Route::get('/bk/restore-accont/{id}', [BkController::class, 'restore_acc'])->name('restore_acc');
    //end Bimbingan Konseling

    //kelas
    Route::get('/kelas/tkj/{kelas}', [AbsenController::class, 'show_absen_tkj_by_kelas'])->name('kelas_tkj');
    //end kelas
});
Route::post('/siswa/create/uiud', function (Request $request) {
    $uid = $request->getContent();
    session(['uid' => $uid]);
    return response('Data received successfully.');
});
