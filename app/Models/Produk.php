<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'gambar',
        'id_kategori',
    ];

    public static function createNewProduk($nama_produk, $deskripsi, $harga, $gambar, $id_kategori)
    {
        return self::create([
            'nama_produk' => $nama_produk,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
            'gambar' => $gambar,
            'id_kategori' => $id_kategori,
        ]);
    }

    public function kategoris()
    {
        return $this->belongsTo(Kategori::class);
    }
    
    public function keluars()
    {
        return $this->hasMany(Keluar::class);
    }
    public function masuks()
    {
        return $this->hasMany(Masuk::class);
    }
    public function laporans()
    {
        return $this->hasMany(Laporan::class);
    }
    // public function pesanans()
    // {
    //     return $this->belongsToMany(Pesanan::class);
    // }
}
