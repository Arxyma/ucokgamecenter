<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kaset extends Model
{
    protected $table = 'kaset';

    protected $fillable = [
        'id_kaset',
        'judul',
        'deskripsi',
        'tanggal_rilis',
        'jumlah_stok',
        'harga_sewa',
    ];

}
