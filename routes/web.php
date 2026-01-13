<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/', function () {
    return view('login');
});

Route::post('/Barang', [BarangController::class, ''])->name('Barang');

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::post('/Barang', function() {
    return view('Barang');
});