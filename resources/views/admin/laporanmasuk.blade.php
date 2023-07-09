@extends('admin/layouts/main')

@section('content')
<h4 class="page-title">{{ $title }}</h4>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Laporan Produk Masuk</h4>
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
                            @foreach($dataMasuk as $masuk)
                            <tr>
                                <td><img src="{{ asset('storage/' . $masuk->gambar) }}" alt="{{ $masuk->gambar }}" style="width: 100px;border-radius: 10px" class="my-2"></td>
                                <td>{{ $masuk->nama_produk }}</td>
                                <td>{{ $masuk->deskripsi }}</td>
                                <td>{{ $masuk->nama_kategori }}</td>
                                <td>{{ $masuk->jumlah_produk }}</td>
                                <td>Rp. {{ $masuk->harga }}</td>
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