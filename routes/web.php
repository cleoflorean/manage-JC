<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- AUTHENTICATION (LOGIN & LOGOUT) ---

// Halaman Utama / Tampilan Login
Route::get('/', function () {
    return view('login');
})->name('login');

// Proses Login (Mengirim data dari form ke Controller)
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');

// Proses Logout (Mengarah ke fungsi logout di AuthController)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- REGISTRATION ---

// Halaman Register
Route::get('/register', function () {
    return view('register');
})->name('register');


// --- DASHBOARD & FITUR ---

// Halaman Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Halaman Manajemen Barang
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::post('/barang/simpan', [BarangController::class, 'store'])->name('barang.store');
Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');