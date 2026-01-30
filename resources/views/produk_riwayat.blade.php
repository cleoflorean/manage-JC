@extends('layouts.app')

@section('title', 'Riwayat Barang Keluar')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0">Riwayat Barang Keluar</h2>
            <p class="text-muted">Catatan pengeluaran stok (filter dan ekspor CSV tersedia).</p>
        </div>
        <div>
            <a href="{{ route('barang.keluar.export', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="btn btn-outline-success me-2">
                <i class="fa-solid fa-file-csv me-1"></i> Ekspor CSV
            </a>
            <a href="{{ route('barang.keluar.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('barang.keluar.history') }}" class="row g-2 align-items-end">
                <div class="col-md-3">
                    <label class="form-label small text-muted">Dari Tanggal</label>
                    <input type="date" name="start_date" class="form-control" value="{{ $startDate ?? '' }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label small text-muted">Sampai Tanggal</label>
                    <input type="date" name="end_date" class="form-control" value="{{ $endDate ?? '' }}">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100" type="submit">Filter</button>
                </div>
                <div class="col-md-4 text-end">
                    <small class="text-muted">Jumlah hasil: {{ $riwayat->count() }}</small>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riwayat as $idx => $r)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $r->tanggal_keluar ? \Carbon\Carbon::parse($r->tanggal_keluar)->format('d-m-Y H:i') : '-' }}</td>
                            <td>{{ optional($r->barang)->NamaProduk ?? 'Barang Dihapus' }}</td>
                            <td>{{ optional($r->barang)->Kategori ?? '-' }}</td>
                            <td>{{ $r->jumlah }} Pcs</td>
                            <td>{{ $r->keterangan ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Tidak ada data riwayat pada periode ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
