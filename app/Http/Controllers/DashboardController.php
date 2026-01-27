<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\barang; // Pastikan menggunakan model barang Anda
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Mengambil total stok real-time (Sinkron dengan Barang Keluar)
        // Perbaikan: Gunakan 'Stok' (huruf kapital) sesuai struktur database Anda
        $totalStok = barang::sum('Stok');


        // 2. Mengambil data untuk kartu lainnya (Opsional/Data Dummy jika belum ada tabel transaksi)
        // Jika Anda belum punya tabel 'transaksi', kita bisa kirim angka statis dulu
        // agar dashboard tidak error saat dipanggil.
        // Menghitung total stok yang masuk dalam 7 hari terakhir
        $barangMasuk = barang::where('created_at', '>=', now()->subDays(7))->sum('Stok');

        // 3. Data statis untuk barang keluar (sementara)
        $barangKeluar = 85;

        // 4. Mengambil list barang (jika diperlukan untuk tabel di dashboard)
        $barang = barang::all();

        return view('dashboard', compact('barang', 'totalStok', 'barangMasuk', 'barangKeluar'));
    }
}