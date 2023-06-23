<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'pengembalian';
    protected $keyType = 'string';

    protected $fillable = [
        'id_pengembalian',
        'id_trx',
        'tanggal_dikembalikan',
        'keterlambatan',
    ];
}
