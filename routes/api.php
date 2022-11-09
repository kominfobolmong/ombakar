<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BerkasController;
use App\Http\Controllers\Api\KapalController;
use App\Http\Controllers\Api\PenyalurController;
use App\Http\Controllers\Api\SuratPermohonanController;
use App\Http\Controllers\Api\SuratRekomendasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'signin']);
Route::post('/register', [AuthController::class, 'signup']);
Route::get('/penyalur', PenyalurController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/logout', [AuthController::class, 'destroy']);
    Route::apiResource('kapal', KapalController::class);
    Route::apiResource('surat_permohonan', SuratPermohonanController::class);
    Route::apiResource('surat_rekomendasi', SuratRekomendasiController::class);
    Route::apiResource('berkas', BerkasController::class);
});
