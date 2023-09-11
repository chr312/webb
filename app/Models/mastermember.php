<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mastermember extends Model
{
    use HasFactory;
     protected $table = 'members';

    protected $guarded = [
        'phone',
    ];
}
