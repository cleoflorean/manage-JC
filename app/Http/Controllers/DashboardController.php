<?php

namespace App\Http\Controllers;

use App\Models\Barang;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        $totalStok = Barang::sum('stok');
        return view('dashboard', compact('barang', 'totalStok'));
    }
}
