<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\LaporanKeluar;


class LaporanKeluarController extends Controller
{
    public function index()
    {
        $title = 'Laporan Produk';
        // $keluar = Keluar::with('produks')->get();
        // mengambil data dari tabel produk masuk
        $keluar = DB::table('produks')->join('keluars', 'produks.id', '=', 'keluars.produk_id')->join('kategoris', 'produks.kategori_id', '=', 'kategoris.id')->get();
        // $kategori = Kategori::all();
        $produk = Produk::all();

        // mengirim data ke view admin->produk
        // return view('admin.keluar', ['dataKeluar' => $keluar, 'dataKategori' => $kategori, 'title' => $title]);
        return view('admin.laporankeluar', ['dataKeluar' => $keluar,'produk'=>$produk,'title' => $title]);
    }
}
