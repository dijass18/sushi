<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_id',
        'jumlah_produk',
    ];

    public static function createNewMasuk($data)
    {
        return self::create([
            'produk_id' => $data['produk_id'],
            'jumlah_produk' => $data['jumlah_produk'],
            // 'deskripsi' => $deskripsi,
            // 'harga' => $harga,
            // 'gambar' => $gambar,
            // 'id_kategori' => $id_kategori,
        ]);
    }

    // public function kategoris()
    // {
    //     return $this->belongsTo(Kategori::class);
    // }
                                                                                    
    public function produks()
    {
        return $this->belongsTo(Produk::class);
    }
    public function laporans()
    {
        return $this->hasOne(Laporan::class);
    }
    // public function pesanans()
    // {
    //     return $this->belongsToMany(Pesanan::class);
    // }
}
