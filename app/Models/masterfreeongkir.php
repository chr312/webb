<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class masterfreeongkir extends Model
{
    use HasFactory;
    protected $table = 'freeongkir_hdr';

    protected $guarded = [
        'id'
    ];
}
