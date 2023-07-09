@extends('admin/layouts/main')

@section('content')
<h4 class="page-title">{{ $title }}</h4>
{{-- @dd($dataKeluar) --}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Tambah Produk Masuk</h4>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Tambah Produk Masuk
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Modal tambah -->
                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        Tambah</span>
                                    <span class="fw-bold">
                                        Produk
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/admin/masuk/store" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <p class="small">Tambah produk baru ke etalase toko</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                                <label>Nama produk</label>
                                                {{-- <input id="nama_produk" name="nama_produk" type="text" class="form-control" placeholder="masukkan nama produk" required> --}}
                                                <select class="custom-select my-1 mr-sm-2" id="produk_id" name="produk_id" required>
                                                    <option selected disabled>Pilih Produk...</option>
                                                    @foreach($produk as $p)
                                                    <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Jumlah Produk</label>
                                                <input id="jumlah_produk" name="jumlah_produk" type="text" class="form-control" placeholder="masukkan deskripsi singkat" required>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Kategori</label>
                                                <select class="custom-select my-1 mr-sm-2" id="kategori_id" name="kategori_id" required>
                                                    <option selected disabled>Pilih kategori...</option>
                                                    @foreach($dataKategori as $kategori)
                                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Deskripsi</label>
                                                <input id="deskripsi" name="deskripsi" type="text" class="form-control" placeholder="masukkan deskripsi singkat" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Harga</label>
                                                <input id="harga" name="harga" type="number" class="form-control" placeholder="masukkan harga produk" required>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Gambar</label>
                                                <input id="gambar" name="gambar" type="file" class="form-control" required>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="modal-footer no-bd">
                                    <input type="submit" class="btn btn-primary" value="Tambah">

                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

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
                                <th>Action</th>
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
                                <th>Action</th>
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
                                <td>
                                    <div class="form-button-action">
                                        <button data-toggle="modal" data-target="#ubahProduk-{{ $masuk->id }}" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                            <i class="fa fa-edit"></i>
                                        </button>

                                        <button data-toggle="modal" data-target="#hapusProduk-{{ $masuk->id }}" class="btn btn-link btn-danger" data-original-title="Edit Task">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="modal fade" id="hapusProduk-{{ $masuk->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                            Hapus produk</span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/admin/masuk/delete" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <p class="small">Yakin ingin menghapus produk "{{ $masuk->produk_id }}"?</p>
                                                        <input type="number" name="id" id="id" value="{{ $masuk->id }}" style="display: none;">
                                                    </div>
                                                    <div class="modal-footer no-bd">
                                                        <input type="submit" class="btn btn-primary" value="Hapus">

                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal ubah -->
                                    <div class="modal fade" id="ubahProduk-{{ $masuk->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                            Ubah produk</span>
                                                        <span class="fw-bold">
                                                            "{{ $masuk->nama_produk }}"
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/admin/masuk/update" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <p class="small">Ubah produk yang telah terdaftar</p>
                                                        <input type="number" name="id" id="id" value="{{ $masuk->id }}" style="display: none;">
                                                        <div class="row">
                                                            {{-- <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Nama produk</label>
                                                                    <input id="nama_produk" name="nama_produk" type="text" class="form-control" placeholder="masukkan nama produk" value="{{ $keluar->nama_produk }}" required>
                                                                </div>
                                                            </div> --}}
                                                            <div class="col-sm-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Nama produk</label>
                                                                    {{-- <input id="nama_produk" name="nama_produk" type="text" class="form-control" placeholder="masukkan nama produk" required> --}}
                                                                    <select class="custom-select my-1 mr-sm-2" id="produk_id" name="produk_id" required>
                                                                        <option selected disabled>Pilih Produk...</option>
                                                                        @foreach($produk as $p)
                                                                        <option value="{{ $p->id }}" @if ($p->id == $masuk->produk_id) selected @endif>{{ $p->nama_produk }}</option>
                                                                        @endforeach 
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Jumlah Produk</label>
                                                                    <input id="jumlah_produk" name="jumlah_produk" type="text" class="form-control" placeholder="masukkan deskripsi singkat" value="{{ $masuk->jumlah_produk }}" required>
                                                                </div>
                                                            {{-- <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Deskripsi</label>
                                                                    <input id="deskripsi" name="deskripsi" type="text" class="form-control" placeholder="masukkan deskripsi singkat" value="{{ $masuk->deskripsi }}" required>
                                                                </div>
                                                            </div> --}}
                                                            {{-- <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Harga</label>
                                                                    <input id="harga" name="harga" type="number" class="form-control" placeholder="masukkan harga produk" value="{{ $masuk->harga }}" required>
                                                                </div>
                                                            </div> --}}
                                                            {{-- <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Kategori</label>
                                                                    <select class="custom-select my-1 mr-sm-2" id="kategori_id" name="kategori_id" required>
                                                                        <option disabled>Pilih kategori...</option>
                                                                        @foreach($dataKategori as $kategori)
                                                                            <option @if($kategori->id == $keluar->kategori_id) {{ 'selected' }} @endif value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div> --}}
                                                            {{-- <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Gambar</label>
                                                                    <input id="gambar" name="gambar" type="file" class="form-control" placeholder="masukkan gambar produk" value="{{ $keluar->gambar }}">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Gambar saat ini</label>
                                                                    <img src="{{ asset('storage/' . $keluar->gambar) }}" alt="{{ $keluar->gambar }}" style="width: 100px;border-radius: 10px" class="my-2">
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer no-bd">
                                                        <input type="submit" class="btn btn-primary" value="Ubah">

                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal hapus -->
                                    
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