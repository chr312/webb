<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masterongkir extends Model
{
    use HasFactory;
     protected $table = 'ongkir_details';

    protected $fillable = [
        'pulau_id',
        'kendaraan_id',
        'km_a',
        'biaya_a',
        'km_b',
        'biaya_b',
        'km_c',
        'biaya_c',
        'km_max',
    ];
}
