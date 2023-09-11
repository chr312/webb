<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masterkendaraan extends Model
{
    use HasFactory;
    protected $table = 'master_kendaraan';

    protected $fillable = [
        'nama',
        'dimensi_panjang',
        'dimensi_lebar',
        'dimensi_tinggi',
        'berat_max',
    ];
}
