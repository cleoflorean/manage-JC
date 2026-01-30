<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
// Panggil Model kamu. Sesuaikan nama model jika berbeda.
use App\Models\barang;       // Master Barang (perhatikan nama model di `app/Models/barang.php`)
use App\Models\BarangMasuk;  // Tabel riwayat masuk (opsional)
use App\Models\BarangKeluar; // Tabel riwayat keluar (opsional)
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // 1. Set Tanggal Default (dari awal bulan s/d hari ini jika kosong)
        // Parse user input safely; fallback to sensible defaults on error.
        try {
            $startDate = $request->input('start_date') ? Carbon::parse($request->input('start_date'))->format('Y-m-d') : Carbon::now()->startOfMonth()->format('Y-m-d');
        } catch (\Exception $e) {
            Log::warning('LaporanController: invalid start_date provided, using start of month. ' . $e->getMessage());
            $startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
        }

        try {
            $endDate = $request->input('end_date') ? Carbon::parse($request->input('end_date'))->format('Y-m-d') : Carbon::now()->format('Y-m-d');
        } catch (\Exception $e) {
            Log::warning('LaporanController: invalid end_date provided, using today. ' . $e->getMessage());
            $endDate = Carbon::now()->format('Y-m-d');
        }

        // 2. Ambil Data Barang Masuk
        // Jika tabel `barang_masuk` tidak ada, fallback ke tabel `barang` (menganggap barang yang dibuat = masuk)
        if (Schema::hasTable('barang_masuk')) {
            try {
                $dataMasuk = BarangMasuk::with('barang')
                    ->whereDate('tanggal_masuk', '>=', $startDate)
                    ->whereDate('tanggal_masuk', '<=', $endDate)
                    ->get()
                    ->map(function ($item) {
                        $item->jenis_transaksi = 'Masuk';
                        $item->tanggal = $item->tanggal_masuk; // standardisasi nama kolom tanggal
                        return $item;
                    });
            } catch (\Exception $e) {
                Log::warning('LaporanController: gagal mengambil data dari barang_masuk: ' . $e->getMessage());
                $dataMasuk = collect();
            }
        } else {
            // Fallback: gunakan tabel `barang` (created_at sebagai tanggal masuk)
            try {
                $dataMasuk = barang::whereDate('created_at', '>=', $startDate)
                    ->whereDate('created_at', '<=', $endDate)
                    ->get()
                    ->map(function ($barang) {
                        $obj = new \stdClass();
                        $obj->jenis_transaksi = 'Masuk';
                        $obj->tanggal = $barang->created_at ?? null;
                        $obj->jumlah = $barang->Stok ?? 0;
                        $obj->barang = $barang;
                        return $obj;
                    });
            } catch (\Exception $e) {
                Log::warning('LaporanController: gagal mengambil data dari barang (fallback masuk): ' . $e->getMessage());
                $dataMasuk = collect();
            }
        }

        // 3. Ambil Data Barang Keluar
        // Jika tabel `barang_keluar` tidak ada, kita gunakan koleksi kosong (user bisa menambahkan tabel nanti)
        if (Schema::hasTable('barang_keluar')) {
            try {
                $dataKeluar = BarangKeluar::with('barang')
                    ->whereDate('tanggal_keluar', '>=', $startDate)
                    ->whereDate('tanggal_keluar', '<=', $endDate)
                    ->get()
                    ->map(function ($item) {
                        $item->jenis_transaksi = 'Keluar';
                        $item->tanggal = $item->tanggal_keluar;
                        return $item;
                    });
            } catch (\Exception $e) {
                Log::warning('LaporanController: gagal mengambil data dari barang_keluar: ' . $e->getMessage());
                $dataKeluar = collect();
            }
        } else {
            $dataKeluar = collect();
        }

        // 4. Gabungkan (Merge) dan Urutkan berdasarkan Tanggal Terbaru
        // Gabungkan (Merge) dan Urutkan berdasarkan Tanggal Terbaru
        // ->values() untuk mereset index setelah merge/sort
        $laporan = $dataMasuk->merge($dataKeluar)->sortByDesc('tanggal')->values();

        return view('laporan', [
            'laporan' => $laporan,
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
    }
}