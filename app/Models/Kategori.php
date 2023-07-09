<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
        'deskripsi'
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }

    public function masuks()
    {
        return $this->hasMany(Masuk::class);
    }

    public function keluars()
    {
        return $this->hasMany(Keluar::class);
    }
}
