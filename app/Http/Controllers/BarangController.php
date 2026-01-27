<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index() {
        $barang = barang::all();
        return view('barang', compact('barang'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'NamaProduk' => 'required|string|max:255',
            'Kategori'   => 'required',
            'HargaBeli'  => 'required|numeric',
            'HargaJual'  => 'required|numeric',
            'Stok'       => 'required|integer'
        ]);

        barang::create([
            'NamaProduk' => $request->NamaProduk,
            'Kategori'   => $request->Kategori,
            'HargaBeli'  => $request->HargaBeli,
            'HargaJual'  => $request->HargaJual,
            'Stok'       => $request->Stok   
        ]);

        return redirect('/barang')->with('success', 'Barang Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaProduk' => 'required|string|max:255',
            'Kategori'   => 'required',
            'HargaBeli'  => 'required|numeric',
            'HargaJual'  => 'required|numeric',
            'Stok'       => 'required|integer'
        ]);

        $barang = barang::findOrFail($id);
        $barang->update([
            'NamaProduk' => $request->NamaProduk,
            'Kategori'   => $request->Kategori,
            'HargaBeli'  => $request->HargaBeli,
            'HargaJual'  => $request->HargaJual,
            'Stok'       => $request->Stok
        ]);

        return redirect('/barang')->with('success', 'Barang Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $barang = barang::findOrFail($id);
        $barang->delete();

        return redirect('/barang')->with('success', 'Barang Berhasil Dihapus');
    }

    /* --- FITUR BARANG KELUAR (PRODUK) --- */

    public function keluarIndex()
    {
        $barang = barang::all(); 
        return view('produk', compact('barang'));
    }

    public function keluarStore(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id', 
            'jumlah'    => 'required|integer|min:1',
            'tujuan'    => 'required|string|max:255'
        ]);

        $item = barang::findOrFail($request->barang_id);

        // Cek kecukupan stok sebelum dikurangi
        if ($item->Stok < $request->jumlah) {
            return back()->with('error', 'Gagal! Stok ' . $item->NamaProduk . ' tidak mencukupi.');
        }

        // Sinkronisasi Database: Update stok
        $item->Stok = $item->Stok - $request->jumlah;
        $item->save(); // Menggunakan save() untuk memastikan perubahan tersimpan

        return redirect('/produk')->with('success', 'Transaksi Berhasil: Stok ' . $item->NamaProduk . ' telah dikurangi.');
    }
}