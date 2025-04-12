<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class objekTanah extends Model
{
    use HasFactory;
    protected $table = 'objek_tanahs';

    protected $fillable = [
        'nomor_hak_bangun',
        'nomor_surat_ukur',
        'nomor_nib',
        'pengesahan_nib',
        'nomor_spp',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'jalan',
        'alamat_lengkap',
        'user_id',
    ];
}
