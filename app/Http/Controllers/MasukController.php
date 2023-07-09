<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\Masuk;

class MasukController extends Controller
{
    public function index()
    {
        $title = 'Produk Masuk';
        // $keluar = Keluar::with('produks')->get();
        // mengambil data dari tabel produk masuk
        $masuk = DB::table('produks')->join('masuks', 'produks.id', '=', 'masuks.produk_id')->join('kategoris', 'produks.kategori_id', '=', 'kategoris.id')->get();
        // $kategori = Kategori::all();
        $produk = Produk::all();

        // mengirim data ke view admin->produk
        // return view('admin.keluar', ['dataKeluar' => $keluar, 'dataKategori' => $kategori, 'title' => $title]);
        return view('admin.masuk', ['dataMasuk' => $masuk,'produk'=>$produk,'title' => $title]);
    }

    public function store(Request $request)
    {
        // simpan file gambar ke folder storage
        // $fileGambar = $request->file('gambar')->store('uploads');
        Masuk::createNewMasuk($request->all());
        // insert data ke tabel produks
        // $keluar = new Keluar;
        // $keluar->produk_id = $request->produk_id;
        // $keluar->deskripsi = $request->deskripsi;
        // $keluar->harga = $request->harga;
        // $keluar->gambar = $fileGambar;
        // $keluar->kategori_id = $request->kategori_id;
        // $keluar->save();

        // alihkan halaman ke halaman produk
        return redirect('/admin/masuk');
    }

    public function update(Request $request)
    {
        $masuk = Masuk::where('id', $request->id)->first();
        // dd([$request->produk_id,$request->id,$keluar]);
      
        // if($request->file('gambar')) {
        //   $fileGambar = $request->file('gambar')->store('uploads');
        
        //   $keluar->gambar = $fileGambar;
        // }
      
        // // update data tabel produks
        // $keluar->nama_produk = $request->nama_produk;
        // $keluar->deskripsi = $request->deskripsi;
        // $keluar->harga = $request->harga;
        $masuk->jumlah_produk = $request->jumlah_produk;
        $masuk->produk_id = $request->produk_id;
        $masuk->save();

        // alihkan halaman ke halaman produk
        return redirect('/admin/masuk');
    }

    public function delete(Request $request)
    {
        // hapus data tabel produks
        Masuk::where('id', $request->id)->delete();
        // alihkan halaman ke halaman produk
        return redirect('/admin/masuk');
    }
}
