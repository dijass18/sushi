<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\LaporanMasuk;

class LaporanMasukController extends Controller
{
    public function index()
    {
        $title = 'Laporan Masuk';
        // $keluar = Keluar::with('produks')->get();
        // mengambil data dari tabel produk masuk
        $masuk = DB::table('produks')->join('masuks', 'produks.id', '=', 'masuks.produk_id')->join('kategoris', 'produks.kategori_id', '=', 'kategoris.id')->get();
        // $kategori = Kategori::all();
        $produk = Produk::all();

        // mengirim data ke view admin->produk
        // return view('admin.keluar', ['dataKeluar' => $keluar, 'dataKategori' => $kategori, 'title' => $title]);
        return view('admin.laporanmasuk', ['dataMasuk' => $masuk,'produk'=>$produk,'title' => $title]);
    }
}
