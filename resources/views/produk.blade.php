@extends('layouts.app')

@section('title', 'Barang Keluar | Konveksi Cloteh')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0">Barang Keluar</h2>
            <p class="text-muted">Kelola riwayat pengeluaran stok barang konveksi.</p>
        </div>
        <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fa-solid fa-plus me-2"></i> Catat Barang Keluar
        </button>
    </div>

    {{-- Alert Success/Error --}}
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm" style="border-radius: 10px;">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger border-0 shadow-sm" style="border-radius: 10px;">
            {{ session('error') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm" style="border-radius: 15px;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3">Nama Barang</th>
                            <th class="py-3">Kategori</th>
                            <th class="py-3 text-center">Sisa Stok</th>
                            <th class="py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barang as $b)
                        <tr>
                            <td class="px-4 fw-semibold">{{ $b->NamaProduk }}</td>
                            <td>{{ $b->Kategori }}</td>
                            <td class="text-center">
                                <span class="badge {{ $b->Stok > 10 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                                    {{ $b->Stok }} Pcs
                                </span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-light text-primary" title="Lihat Detail"><i class="fa-solid fa-eye"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow" style="border-radius: 20px;">
            <div class="modal-header border-0 px-4 pt-4">
                <h5 class="fw-bold">Catat Barang Keluar</h5>
                <button type="button" class="btn-close" data-bs-close="modal"></button>
            </div>
            {{-- Form diarahkan ke rute simpan yang kita buat di controller --}}
            <form action="{{ route('barang.keluar.store') }}" method="POST">
                @csrf
                <div class="modal-body px-4">
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">PILIH BARANG</label>
                        <select class="form-select border-0 bg-light py-2" style="border-radius: 10px;" name="barang_id" required>
                            <option value="">-- Pilih Barang dari Stok --</option>
                            @foreach($barang as $b)
                                <option value="{{ $b->id }}">{{ $b->NamaProduk }} (Stok: {{ $b->Stok }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">JUMLAH KELUAR</label>
                        <input type="number" class="form-control border-0 bg-light py-2" style="border-radius: 10px;" name="jumlah" required min="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">TUJUAN / PELANGGAN</label>
                        <input type="text" class="form-control border-0 bg-light py-2" style="border-radius: 10px;" name="tujuan" required placeholder="Contoh: Pelanggan Jauzi / Toko Orange">
                    </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4">
                    <button type="button" class="btn btn-light" style="border-radius: 10px;" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4" style="border-radius: 10px; background-color: #3b82f6;">Simpan Transaksi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .table thead th {
        font-size: 0.85rem;
        letter-spacing: 0.05em;
        color: #64748b;
        border: none;
    }
    .table tbody td {
        border-color: #f1f5f9;
        font-size: 0.95rem;
    }
    .bg-danger-subtle {
        background-color: #fee2e2 !important;
        color: #dc2626 !important;
    }
    .bg-success-subtle {
        background-color: #dcfce7 !important;
        color: #16a34a !important;
    }
</style>
@endsection