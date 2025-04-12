<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saksi extends Model
{
    use HasFactory;
    protected $table = 'saksis';

    protected $fillable = [
        'nama_saksi',
        'nik_saksi',
        'tgl_lahir_saksi',
        'tempat_lahir_saksi',
        'alamat_saksi',
        'user_id',
    ];
}
