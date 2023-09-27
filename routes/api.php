<?php

use App\Http\Controllers\Api\ApiAbsenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/absensi/store', [ApiAbsenController::class, 'store_absen']);
