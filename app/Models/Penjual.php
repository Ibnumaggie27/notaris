<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    use HasFactory;
    protected $table = 'penjuals';

    protected $fillable = [
        'nama_penjual',
        'nik_penjual',
        'tgl_lahir_penjual',
        'tempat_lahir_penjual',
        'nama_istri_penjual',
        'nik_istri_penjual',
        'tgl_lahir_istri_penjual',
        'tempat_lahir_istri_penjual',
        'alamat_penjual',
        'user_id',
    ];
}
