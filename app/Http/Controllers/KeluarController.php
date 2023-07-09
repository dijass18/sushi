<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\Keluar;


class KeluarController extends Controller
{
    public function index()
    {
        $title = 'Produk Keluar';
        // $keluar = Keluar::with('produks')->get();
        // mengambil data dari tabel produk masuk
        $keluar = DB::table('produks')->join('keluars', 'produks.id', '=', 'keluars.produk_id')->join('kategoris', 'produks.kategori_id', '=', 'kategoris.id')->get();
        // $kategori = Kategori::all();
        $produk = Produk::all();

        // mengirim data ke view admin->produk
        // return view('admin.keluar', ['dataKeluar' => $keluar, 'dataKategori' => $kategori, 'title' => $title]);
        return view('admin.keluar', ['dataKeluar' => $keluar,'produk'=>$produk,'title' => $title]);
    }

    public function store(Request $request)
    {
        // simpan file gambar ke folder storage
        // $fileGambar = $request->file('gambar')->store('uploads');
        Keluar::createNewKeluar($request->all());
        // insert data ke tabel produks
        // $keluar = new Keluar;
        // $keluar->produk_id = $request->produk_id;
        // $keluar->deskripsi = $request->deskripsi;
        // $keluar->harga = $request->harga;
        // $keluar->gambar = $fileGambar;
        // $keluar->kategori_id = $request->kategori_id;
        // $keluar->save();

        // alihkan halaman ke halaman produk
        return redirect('/admin/keluar');
    }

    public function update(Request $request)
    {
        $keluar = Keluar::where('id', $request->id)->first();
        // dd([$request->produk_id,$request->id,$keluar]);
      
        // if($request->file('gambar')) {
        //   $fileGambar = $request->file('gambar')->store('uploads');
        
        //   $keluar->gambar = $fileGambar;
        // }
      
        // // update data tabel produks
        // $keluar->nama_produk = $request->nama_produk;
        // $keluar->deskripsi = $request->deskripsi;
        // $keluar->harga = $request->harga;
        $keluar->jumlah_produk = $request->jumlah_produk;
        $keluar->produk_id = $request->produk_id;
        $keluar->save();

        // alihkan halaman ke halaman produk
        return redirect('/admin/keluar');
    }

    public function delete(Request $request)
    {
        // hapus data tabel produks
        Keluar::where('id', $request->id)->delete();

        // alihkan halaman ke halaman produk
        return redirect('/admin/keluar');
    }
}
