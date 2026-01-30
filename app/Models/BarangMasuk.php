<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';

    // jika tabel Anda tidak memiliki created_at/updated_at
    public $timestamps = false;

    protected $fillable = [
        'barang_id',
        'jumlah',
        'tanggal_masuk',
        'keterangan'
    ];

    public function barang()
    {
        // gunakan nama model yang ada (case-insensitive)
        return $this->belongsTo(barang::class, 'barang_id');
    }
}