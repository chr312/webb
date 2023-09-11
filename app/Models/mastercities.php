<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mastercities extends Model
{
    use HasFactory;
    protected $table = 'cities';

    protected $fillable = [
        'province_id',
        'city_code',
        'city_name',
    ];
}
