<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        $barang = barang::all();
    
    return view('Barang', compact('barang'));
    }

    public function TambahBarang(Request $request){

        $request->validate([
        'NamaProduk' =>  'required|string|max:255',
        'Katagori' =>  'required|in:makanan,minuman,sembako,bahan masak,frozen food,susu dan olahan, perawatan tubuh, perlengkapan ATK, bat dan kesehatan, lain-lain',
        'HargaBeli' =>  'required|numeric',
        'HargaJual' => 'required|numeric',
        'Stok' => 'required|integer'
        ]);

        Barang::create([
        'NamaProduk' => $request->NamaProduk,
        'Kategori' => $request->Kategori,
        'HargaBeli' => $request->HargaBeli,
        'HargaJual' => $request->HargaJual,
        'Stok' => $request->Stok   
        ]);

        return redirect()->route('Barang')->with('success', 'Barang Berhasil Di Tambahkan');
    }


    
}
