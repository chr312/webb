<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masteraddress extends Model
{
    use HasFactory;
     protected $table = 'addresses';

    protected $fillable = [
        'address',
        'phone_number',
        'province_id',
        'city_id',
        'district_id',
        'sub_district_id',
        'latitude',
        'longitude',
    ];
}
