<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $keyType = 'string';

    protected $fillable = [
        'id_trx',
        'id_kaset',
        'id_penyewa',
        'jumlah_sewa',
        'total_harga',
        'tanggal_penyewaan',
        'tanggal_pengembalian',
    ];
}
