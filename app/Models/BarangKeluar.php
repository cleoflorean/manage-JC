<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar';
    public $timestamps = false;

    protected $fillable = [
        'barang_id',
        'jumlah',
        'tanggal_keluar',
        'keterangan'
    ];

    public function barang()
    {
        return $this->belongsTo(barang::class, 'barang_id');
    }
}