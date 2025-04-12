<?php

namespace App\Http\Controllers;

use App\Models\{ObjekTanah, BerkasAjb, Penjual, Pembeli, Saksi};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ajbController extends Controller
{
    public function form(Request $request)
    {
        $step = session('step', 1);
        return view('user.ajb.AJB', compact('step'));
    }

    public function formStepSubmit(Request $request)
    {
        $step = $request->input('step');

        if ($step == 1) {
            $validated = $request->validate([
                'nama_penjual' => 'required',
                'nik_penjual' => 'required',
                'tgl_lahir_penjual' => 'required|date',
                'tempat_lahir_penjual' => 'required',
                'nama_istri_penjual' => 'required',
                'nik_istri_penjual' => 'required',
                'tgl_lahir_istri_penjual' => 'required|date',
                'tempat_lahir_istri_penjual' => 'required',
                'alamat_penjual' => 'required',
            ]);

            session(['step1' => $validated]);
            session(['step' => 2]);

            return redirect()->route('user.ajb.AJB');
        }

        if ($step == 2) {
            $validated = $request->validate([
                'nama_pembeli' => 'required',
                'nik_pembeli' => 'required',
                'tgl_lahir_pembeli' => 'required|date',
                'tempat_lahir_pembeli' => 'required',
                'alamat_pembeli' => 'required',
            ]);

            session(['step2' => $validated]);
            session(['step' => 3]);

            return redirect()->route('user.ajb.AJB');
        }

        if ($step == 3) {
            $request->merge([
                'harga_transaksi_tanah' => str_replace('.', '', $request->harga_transaksi_tanah),
            ]);
            $validated = $request->validate([
                'nomor_hak_bangun' => 'required',
                'nomor_surat_ukur' => 'required',
                'nomor_nib' => 'required',
                'pengesahan_nib' => 'required',
                'nomor_spp' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'kecamatan' => 'required',
                'kelurahan' => 'required',
                'jalan' => 'required',
                'alamat_lengkap' => 'required',
                'harga_transaksi_tanah' => 'required|numeric',
                'tanggal_pengajuan' => 'required|date',
            ]);

            session(['step3' => $validated]);
            session(['step' => 4]);

            return redirect()->route('user.ajb.AJB');
        }

        if ($step == 4) {
            $validated = $request->validate([
                'file_ktp_penjual' => 'required|file|mimes:pdf,jpg,jpeg,png',
                'file_ktp_istri_penjual' => 'required|file|mimes:pdf,jpg,jpeg,png',
                'file_kk_penjual' => 'required|file|mimes:pdf,jpg,jpeg,png',
                'file_ktp_pembeli' => 'required|file|mimes:pdf,jpg,jpeg,png',
                'file_kk_pembeli' => 'required|file|mimes:pdf,jpg,jpeg,png',
                'file_akta_nikah' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
                'file_sertifikat' => 'required|file|mimes:pdf,jpg,jpeg,png',
                'file_bukti_pbb' => 'required|file|mimes:pdf,jpg,jpeg,png',
                'file_imb' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
                'file_persetujuan' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
                'file_dokumen_lainnya' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            ]);

            $files = [];
            foreach ($validated as $key => $file) {
                if ($request->hasFile($key)) {
                    $files[$key] = $request->file($key)->store('berkas','public');
                }
            }

            session(['step4' => $files]);
            session(['step' => 5]);

            return redirect()->route('user.ajb.AJB');
        }

        if ($step == 5) {
            $validated = $request->validate([
                'nama_saksi' => 'required',
                'nik_saksi' => 'required',
                'tgl_lahir_saksi' => 'required|date',
                'tempat_lahir_saksi' => 'required',
                'alamat_saksi' => 'required',
            ]);

            // Ambil semua data dari session
            $userId = auth()->id();
            $step1 = session('step1');
            $step2 = session('step2');
            $step3 = session('step3');
            $step4 = session('step4');

            // Simpan ke database
            $penjual = Penjual::create(array_merge($step1, ['user_id' => $userId]));
            $pembeli = Pembeli::create(array_merge($step2, ['user_id' => $userId]));
            $objek = ObjekTanah::create(array_merge($step3, ['user_id' => $userId]));

            $berkas = new BerkasAjb();
            $berkas->user_id = $userId;
            foreach ($step4 as $field => $path) {
                $berkas->$field = $path;
            }
            $berkas->save();

            $saksi = Saksi::create(array_merge($validated, ['user_id' => $userId]));

            \App\Models\PengajuanAjb::create([
                'users_id' => $userId,
                'objekTanah_id' => $objek->id,
                'berkas_id' => $berkas->id,
                'penjual_id' => $penjual->id,
                'pembeli_id' => $pembeli->id,
                'saksi_id' => $saksi->id,
                'harga_transaksi_tanah' => $step3['harga_transaksi_tanah'],
                'tanggal_pengajuan' => $step3['tanggal_pengajuan'],
            ]);

            session()->forget(['step', 'step1', 'step2', 'step3', 'step4']);

            return redirect()->route('user.riwayat')->with('success', 'Data AJB berhasil disimpan!');
        }
    }
}
