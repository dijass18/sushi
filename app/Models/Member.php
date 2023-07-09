<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'nama','alamat','jenis_kelamin','tlp',
    ];
}
