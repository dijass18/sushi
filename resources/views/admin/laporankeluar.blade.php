@extends('admin/layouts/main')

@section('content')
<h4 class="page-title">{{ $title }}</h4>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Laporan Produk Keluar</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama produk</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Jumlah Produk</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama produk</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Jumlah Produk</th>
                                <th>Harga</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($dataKeluar as $keluar)
                            <tr>
                                <td><img src="{{ asset('storage/' . $keluar->gambar) }}" alt="{{ $keluar->gambar }}" style="width: 100px;border-radius: 10px" class="my-2"></td>
                                <td>{{ $keluar->nama_produk }}</td>
                                <td>{{ $keluar->deskripsi }}</td>
                                <td>{{ $keluar->nama_kategori }}</td>
                                <td>{{ $keluar->jumlah_produk }}</td>
                                <td>Rp. {{ $keluar->harga }}</td>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection