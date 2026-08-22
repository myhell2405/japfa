<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\KandangController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\KelasBobotHargaController;
use App\Http\Controllers\DocBibitController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\KategoriMortalitasController;
use App\Http\Controllers\Manajer\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

// Manajer routes (master data & user management)
Route::middleware(['auth'])->prefix('manajer')->name('manajer.')->group(function(){
    // Master data resources
    Route::resource('master/mitra', MitraController::class);
    Route::resource('master/kandang', KandangController::class);
    Route::resource('master/kontrak', KontrakController::class);
    Route::resource('master/kelas-bobot-harga', KelasBobotHargaController::class);
    Route::resource('master/doc-bibit', DocBibitController::class);
    Route::resource('master/pakan', PakanController::class);
    Route::resource('master/obat', ObatController::class);
    Route::resource('master/kategori-mortalitas', KategoriMortalitasController::class);

    // User management
    Route::resource('users', UserController::class);
});
