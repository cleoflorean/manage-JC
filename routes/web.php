<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- AUTHENTICATION (LOGIN & LOGOUT) ---

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('login');
    })->name('login');
});

// Proses Login (Mengirim data dari form ke Controller)
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');

// Proses Logout (Mengarah ke fungsi logout di AuthController)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- DASHBOARD & FITUR (PROTECTED) ---

Route::middleware('auth')->group(function () {
    
    // Halaman Dashboard Utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Manajemen Barang (Barang Masuk)
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::post('/barang/simpan', [BarangController::class, 'store'])->name('barang.store');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

    // Manajemen Barang Keluar (Produk)
    Route::get('/produk', [BarangController::class, 'keluarIndex'])->name('barang.keluar.index');
    Route::post('/produk/simpan', [BarangController::class, 'keluarStore'])->name('barang.keluar.store');

    // Laporan Arus Stok
    Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');

    // Riwayat Barang Keluar (History + CSV Export)
    Route::get('/produk/riwayat', [App\Http\Controllers\BarangController::class, 'keluarHistory'])->name('barang.keluar.history');
    Route::get('/produk/riwayat/export', [App\Http\Controllers\BarangController::class, 'keluarExport'])->name('barang.keluar.export');

});