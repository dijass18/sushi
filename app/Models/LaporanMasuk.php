<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanMasuk extends Model
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
        ]);
    }                                                                           
    public function produks()
    {
        return $this->belongsTo(Produk::class);
    }
}
