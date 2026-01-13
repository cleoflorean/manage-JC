<div>
    @extends('layouts.header')
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->

    <div class="container mt-5">
        <h1>Produk Kami</h1>

        <div class="mb-2">
                <button 
                data-bs-toggle="modal"
                data-bs-target="#TambahBarang"
                class="btn btn-success btn-sm">Tambah Barang</button>
        </div>
        <div class="w-50 mx-auto border p-3 mt-3">
            <form action="" method="post">
                <label for="NamaProduk">Nama Produk</label>
                <input type="text" id="NamaProduk" name="NamaProduk" class="form-control">

                <label for="Kategori">Kategori</label>
                <select name="Kategori" id="Kategori" class="form-select">
                    <option>Pilih Kategori</option>
                    <option value="makanan">Makanan</option>
                    <option value="minuman">Minuman</option>
                    <option value="sembako">Sembako</option>
                    <option value="bahan masak">Bahan Masak</option>
                    <option value="frozen food">Frozen Food</option>
                    <option value="susu dan olahan">Produk Susu dan Olahan</option>
                    <option value="perawatan tubuh">Perawatan Tubuh</option>
                    <option value="perlengkapan ATK">Perlengkapan ATK</option>
                    <option value="obat dan kesehatan">Obat dan Kesehatan</option>
                    <option value="lain-lain">Lain-lain</option>

                </select>

                <label for="HargaBeli">Harga Beli</label>
                <input type="text" id="HargaBeli" name="HargaBeli" class="form-control">

                <label for="HargaJual">Harga Jual</label>
                <input type="text" id="HargaJual" name="HargaJual" class="form-control">

                <label for="Stok">Stok Produk</label>
                <input type="text" id="Stok" name="Stok" class="form-control">

                <input class="btn btn-success mt-3" type="submit" value="Tambah Produk">
            </form>
        </div>

        

     <table class="table table-striped table-hover table-bordered">
  <thead class="table">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Kategori</th>
      <th scope="col">Harga Beli</th>
      <th scope="col">Harga Jual</th>
      <th scope="col">Stok Produk</th>
      <th scope="col">Update</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach($barang as $brg)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $brg->NamaProduk }}</td>
            <td>{{ $brg->Kategori }}</td>
            <td>{{ $brg->HargaBeli }}</td>
            <td>{{ $brg->HargaJual }}</td>
            <td>{{ $brg->Stok}}</td>
            <td>{{ $brg->Updated}}</td>
            <td>
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <a href='' class="btn btn-sm btn-success">Edit</a>
                    </div>

                    <div class="col d-flex justify-content-center">
                        <a href='' class="btn btn-sm btn-danger">Hapus</a>
                    </div>
                    
                </div>
                    
            </td>
    @endforeach
    </table>
    </div>
     
    

</div>


