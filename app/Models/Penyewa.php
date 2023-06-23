<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $table = 'penyewa';

    protected $fillable = [
        'id_penyewa',
        'nama_penyewa',
        'no_ktp',
        'alamat',
        'no_hp',
    ];
}
