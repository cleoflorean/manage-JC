@extends('layouts.app') @section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Arus Stok</h1>
        <button onclick="window.print()" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-print fa-sm text-white-50"></i> Cetak Laporan
        </button>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filter Periode</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('laporan.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Dari Tanggal</label>
                        <input type="date" name="start_date" class="form-control" value="{{ $startDate }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Sampai Tanggal</label>
                        <input type="date" name="end_date" class="form-control" value="{{ $endDate }}">
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search"></i> Tampilkan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th> <th>Status</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($laporan as $index => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @php
                                    $date = $item->tanggal ?? null;
                                @endphp
                                {{ $date ? \Carbon\Carbon::parse($date)->format('d-m-Y') : '-' }}
                            </td>

                            <td>{{ optional($item->barang)->NamaProduk ?? optional($item->barang)->nama_barang ?? 'Barang Dihapus' }}</td>

                            <td>{{ optional($item->barang)->Kategori ?? optional($item->barang)->kategori ?? '-' }}</td>

                            <td>
                                @if(($item->jenis_transaksi ?? '') == 'Masuk')
                                    <span class="badge bg-success" style="color: white; padding: 5px 10px;">Barang Masuk</span>
                                @else
                                    <span class="badge bg-danger" style="color: white; padding: 5px 10px;">Barang Keluar</span>
                                @endif
                            </td>

                            <td class="font-weight-bold">
                                {{ $item->jumlah ?? (optional($item->barang)->Stok ?? '-') }} Pcs
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-3">
                                Tidak ada transaksi pada periode tanggal ini.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection