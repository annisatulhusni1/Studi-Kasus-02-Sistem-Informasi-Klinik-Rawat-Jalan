<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

// Halaman login (hanya untuk yang belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

// Semua route di bawah ini wajib login
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', fn () => redirect()->route('pasiens.index'));

    // Semua role: lihat daftar pasien
    Route::get('/pasiens', [PasienController::class, 'index'])->name('pasiens.index');

    // Admin + petugas: tambah dan ubah
    // (create HARUS di atas /pasiens/{pasien})
    Route::middleware('role:admin,petugas')->group(function () {
        Route::get('/pasiens/create', [PasienController::class, 'create'])->name('pasiens.create');
        Route::post('/pasiens', [PasienController::class, 'store'])->name('pasiens.store');
        Route::get('/pasiens/{pasien}/edit', [PasienController::class, 'edit'])->name('pasiens.edit');
        Route::match(['put', 'patch'], '/pasiens/{pasien}', [PasienController::class, 'update'])->name('pasiens.update');
    });

    // Admin saja: hapus
    Route::delete('/pasiens/{pasien}', [PasienController::class, 'destroy'])
        ->middleware('role:admin')
        ->name('pasiens.destroy');

    // Semua role: lihat detail (setelah create supaya "create" tidak dianggap {pasien})
    Route::get('/pasiens/{pasien}', [PasienController::class, 'show'])->name('pasiens.show');
});