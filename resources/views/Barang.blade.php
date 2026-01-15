@extends('layouts.header')

<style>
    body {
        background-color: #f4f7f6;
        font-family: 'Poppins', sans-serif;
    }

    .main-container {
        padding-top: 30px;
        padding-bottom: 50px;
    }

    /* Card Styling */
    .custom-card {
        background: #ffffff;
        border-radius: 15px;
        border: none;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        padding: 30px;
        margin-bottom: 30px;
    }

    .card-title {
        font-weight: 600;
        color: #334155;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Form Modern Styling */
    .form-label {
        font-size: 13px;
        font-weight: 500;
        color: #64748b;
        margin-left: 5px;
    }

    .form-control, .form-select {
        border-radius: 10px;
        padding: 10px 15px;
        border: 1px solid #e2e8f0;
    }

    .form-control:focus {
        border-color: #17a2b8;
        box-shadow: 0 0 0 3px rgba(23, 162, 184, 0.1);
    }

    /* Table Styling */
    .table-container {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
    }

    .table thead {
        background-color: #f8fafc;
    }

    .table thead th {
        font-weight: 600;
        color: #475569;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.5px;
        padding: 15px;
        border-bottom: 2px solid #e2e8f0;
    }

    .table tbody td {
        padding: 15px;
        vertical-align: middle;
        color: #334155;
        font-size: 14px;
    }

    /* Button Styling */
    .btn-custom-primary {
        background-color: #17a2b8;
        border: none;
        border-radius: 8px;
        padding: 8px 20px;
        font-weight: 500;
        color: white;
        transition: 0.3s;
    }

    .btn-custom-primary:hover {
        background-color: #138496;
        color: white;
    }

    .badge-category {
        background: rgba(23, 162, 184, 0.1);
        color: #17a2b8;
        padding: 5px 12px;
        border-radius: 20px;
        font-weight: 500;
        font-size: 11px;
    }
</style>

<div class="container main-container">
    <h2 class="card-title">📦 Kelola Produk Kami</h2>

    <div class="custom-card">
        <h5 class="mb-4" style="color: #17a2b8;">Tambah Barang Baru</h5>
        <form action="{{ route('barang.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="NamaProduk" class="form-control" placeholder="Contoh: Susu UHT" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kategori</label>
                    <select name="Kategori" class="form-select" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                        <option value="sembako">Sembako</option>
                        <option value="frozen food">Frozen Food</option>
                        <option value="susu dan olahan">Produk Susu dan Olahan</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Harga Beli (Rp)</label>
                    <input type="number" name="HargaBeli" class="form-control" placeholder="0" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Harga Jual (Rp)</label>
                    <input type="number" name="HargaJual" class="form-control" placeholder="0" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Stok</label>
                    <input type="number" name="Stok" class="form-control" placeholder="0" required>
                </div>
                <div class="col-12 mt-4 text-end">
                    <button type="submit" class="btn btn-custom-primary">
                        Simpan Produk
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="custom-card">
        <div class="table-responsive table-container">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th class="text-center">Stok</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barang as $brg)
                        <tr>
                            <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                            <td class="fw-medium text-dark">{{ $brg->NamaProduk }}</td>
                            <td><span class="badge-category">{{ strtoupper($brg->Kategori) }}</span></td>
                            <td>Rp {{ number_format($brg->HargaBeli, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($brg->HargaJual, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <span class="fw-bold {{ $brg->Stok < 10 ? 'text-danger' : 'text-success' }}">
                                    {{ $brg->Stok }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-outline-success me-1" style="border-radius: 6px;">Edit</a>
                                <a href="#" class="btn btn-sm btn-outline-danger" style="border-radius: 6px;">Hapus</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Belum ada data barang.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>