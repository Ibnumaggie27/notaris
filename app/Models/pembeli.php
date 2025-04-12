<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembeli extends Model
{
    use HasFactory;
    protected $table = 'pembelis';

    protected $fillable = [
        'nama_pembeli',
        'nik_pembeli',
        'tgl_lahir_pembeli',
        'tempat_lahir_pembeli',
        'alamat_pembeli',
        'user_id',
    ];
}
