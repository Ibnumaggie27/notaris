<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanAjb extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_ajbs';

    protected $fillable = [
        'users_id',
        'penjual_id',
        'pembeli_id',
        'objekTanah_id',
        'berkas_id',
        'saksi_id',
        'harga_transaksi_tanah',
        'tanggal_pengajuan',
    ];

    // Relasi (jika kamu pakai)
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function penjual()
    {
        return $this->belongsTo(Penjual::class, 'penjual_id');
    }

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'pembeli_id');
    }

    public function objekTanah()
    {
        return $this->belongsTo(ObjekTanah::class, 'objekTanah_id');
    }

    public function berkas()
    {
        return $this->belongsTo(BerkasAjb::class, 'berkas_id');
    }

    public function saksi()
    {
        return $this->belongsTo(Saksi::class, 'saksi_id');
    }
}
