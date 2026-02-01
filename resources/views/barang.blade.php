@extends('layouts.app')

@section('title', 'Barang ')

@section('content')

<!-- Link CSS External -->
<link rel="stylesheet" href="{{ asset('css/barang.css') }}">

<div class="container main-container">
    <h2 class="card-title">Kelola Produk</h2>

    <!-- Alert Success -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="custom-card">
        <h5 class="mb-4" style="color: #3b82f6;" id="form-title">Tambah Barang Baru</h5>
        <form action="{{ route('barang.store') }}" method="POST" id="barangForm" enctype="multipart/form-data">
            @csrf

            {{-- Tampilkan error validasi jika ada --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="NamaProduk" id="NamaProduk" class="form-control" placeholder="Masukkan nama produk" value="{{ old('NamaProduk') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kategori</label>
                    <select name="Kategori" id="Kategori" class="form-select" required>
                        <option value="" disabled {{ old('Kategori') ? '' : 'selected' }}>Pilih Kategori</option>
                        <option value="makanan" {{ old('Kategori')=='makanan' ? 'selected' : '' }}>Makanan</option>
                        <option value="minuman" {{ old('Kategori')=='minuman' ? 'selected' : '' }}>Minuman</option>
                        <option value="sembako" {{ old('Kategori')=='sembako' ? 'selected' : '' }}>Sembako</option>
                        <option value="frozen food" {{ old('Kategori')=='frozen food' ? 'selected' : '' }}>Frozen Food</option>
                        <option value="susu dan olahan" {{ old('Kategori')=='susu dan olahan' ? 'selected' : '' }}>Produk Susu dan Olahan</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Harga Beli (Rp)</label>
                    <input type="number" name="HargaBeli" id="HargaBeli" class="form-control" placeholder="0" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Harga Jual (Rp)</label>
                    <input type="number" name="HargaJual" id="HargaJual" class="form-control" placeholder="0" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Stok</label>
                    <input type="number" name="Stok" id="Stok" class="form-control" placeholder="0" required>
                </div>
                <div class="col-12 mt-4 text-end">
                    <button type="button" class="btn btn-outline-secondary me-2" id="btnBatal" style="display:none;" onclick="batalEdit()">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-custom-primary" id="btnSubmit">
                        <i class="fa-solid fa-floppy-disk me-2"></i> Tambah Produk
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
                                <button type="button" class="btn btn-sm btn-outline-success me-1" style="border-radius: 6px;" data-id="{{ $brg->id }}" data-nama="{{ $brg->NamaProduk }}" data-kategori="{{ $brg->Kategori }}" data-harga-beli="{{ $brg->HargaBeli }}" data-harga-jual="{{ $brg->HargaJual }}" data-stok="{{ $brg->Stok }}" onclick="editBarang(this)">
                                    Edit
                                </button>
                                
                                <button type="button" class="btn btn-sm btn-outline-danger" style="border-radius: 6px;" data-id="{{ $brg->id }}" onclick="hapusBarang(this)">
                                    Hapus
                                </button>
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

<style>
    body {
    background-color: #f4f7f6;
    font-family: "Poppins", sans-serif;
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

.form-control,
.form-select {
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

/* Alert Styling */
.alert-success {
    background-color: #d1fae5;
    border: 1px solid #6ee7b7;
    color: #065f46;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 20px;
}
</style>

<!-- Variable untuk JavaScript -->
<script>
    const barangStoreRoute = "{{ route('barang.store') }}";
</script>

<!-- Link JavaScript External -->
<script src="{{ asset('js/barang.js') }}"></script>
@endsection
