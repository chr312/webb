<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SemuaPesanan extends Model
{
    use HasFactory;
    protected $table = 'transaction_headers';

     protected $guarded = [
        'id',
    ];

}
