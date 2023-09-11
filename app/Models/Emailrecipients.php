<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emailrecipients extends Model
{
    use HasFactory;
    protected $table = 'email_recipients';

    protected $fillable = [
        'email',
        'kode_cabang'
    ];
}
