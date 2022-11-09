<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\KapalController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PenyalurController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\SuratPermohonanController;
use App\Http\Controllers\Admin\SuratRekomendasiController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DetailPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/', [LoginController::class, 'showLoginForm']);
Route::prefix('search')->group(function () {
    Route::post('/result', [SearchController::class, 'news'])->name('search');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('profile', ProfileController::class);
    Route::resource('penyalur', PenyalurController::class);
    Route::resource('kapal', KapalController::class);
    Route::resource('surat_permohonan', SuratPermohonanController::class);
    Route::resource('surat_rekomendasi', SuratRekomendasiController::class);
    Route::resource('user', UserController::class);
    Route::resource('roles', RoleController::class);
});
