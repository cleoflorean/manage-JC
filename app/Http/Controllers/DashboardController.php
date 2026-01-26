<?php

namespace App\Http\Controllers;

use App\Models\barang; // Pastikan menggunakan model barang Anda
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Mengambil total stok real-time (Sinkron dengan Barang Keluar)
        // Perbaikan: Gunakan 'Stok' (huruf kapital) sesuai struktur database Anda
        $totalStok = barang::sum('Stok');
        // $barangMasuk = 

        // 2. Mengambil data untuk kartu lainnya (Opsional/Data Dummy jika belum ada tabel transaksi)
        // Jika Anda belum punya tabel 'transaksi', kita bisa kirim angka statis dulu
        // agar dashboard tidak error saat dipanggil.
        $barangMasuk = 560; 
        $barangKeluar = 85;

        // 3. Mengambil list barang (jika diperlukan untuk tabel di dashboard)
        $barang = barang::all();

        return view('dashboard', compact('barang', 'totalStok', 'barangMasuk', 'barangKeluar'));
    }
}