<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berkasAjb extends Model
{
    use HasFactory;
    protected $table = 'berkas_ajbs';

    protected $fillable = [
        'file_ktp_penjual',
        'file_ktp_istri_penjual',
        'file_kk_penjual',
        'file_ktp_pembeli',
        'file_kk_pembeli',
        'file_akta_nikah',
        'file_sertifikat',
        'file_bukti_pbb',
        'file_imb',
        'file_persetujuan',
        'file_dokumen_lainnya',
        'user_id',
    ];
}
