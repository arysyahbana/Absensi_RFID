<?php

use App\Http\Controllers\Api\ApiAbsenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/absensi/masuk', [ApiAbsenController::class, 'masuk']);
Route::post('/absensi/keluar', [ApiAbsenController::class, 'keluar']);
Route::post('/absensi/izin', [ApiAbsenController::class, 'izin']);
// Route::post('/absensi/cek-siswa', [ApiAbsenController::class, 'cekSiswa']);
