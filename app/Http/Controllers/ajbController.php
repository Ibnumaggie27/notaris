<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use App\Models\Pembeli;
use App\Models\ObjekTanah;
use App\Models\BerkasAjb;
use App\Models\Saksi;
use App\Models\PengajuanAjb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjbController extends Controller
{
    public function showForm(Request $request, $step = null)
    {
        // Pastikan step default selalu 1 jika tidak ada
        $step = $step ?? $request->session()->get('step', 1);
        $step = intval($step);
        $request->session()->put('step', $step);
        $ajbData = $request->session()->get('ajb_data', []);
        return view('user.ajb.AJB', compact('step', 'ajbData'));
    }

    public function handleForm(Request $request)
    {
        if ($request->input('action') === 'exit') {
            $request->session()->forget(['ajb_data', 'step']);
            return redirect()->route('user.ajb.AJB')->with('info', 'Pengisian form dibatalkan.');
        }
    
        $step = $request->input('step', 1);
        $user = Auth::user();
    
        // Cek aksi tombol (next / back)
        if ($request->input('action') === 'back') {
            $step = max(1, $step - 1);
            $request->session()->put('step', $step);
            return redirect()->route('user.ajb.AJB', ['step' => $step]);
        }
    
        $ajbData = $request->session()->get('ajb_data', []);
    
        switch ($step) {
            case 1:
                $ajbData['penjual'] = $request->only([
                    'nama_penjual', 'nik_penjual', 'tgl_lahir_penjual', 'tempat_lahir_penjual',
                    'nama_istri_penjual', 'nik_istri_penjual', 'tgl_lahir_istri_penjual', 'tempat_lahir_istri_penjual',
                    'alamat_penjual'
                ]);
                $request->session()->put('ajb_data', $ajbData);
                $request->session()->put('step', 2);
                return redirect()->route('user.ajb.AJB', ['step' => 2]); // Pastikan langkah 2 diteruskan
    
            case 2:
                $ajbData['pembeli'] = $request->only([
                    'nama_pembeli', 'nik_pembeli', 'tgl_lahir_pembeli', 'tempat_lahir_pembeli', 'alamat_pembeli'
                ]);
                $request->session()->put('ajb_data', $ajbData);
                $request->session()->put('step', 3);
                return redirect()->route('user.ajb.AJB', ['step' => 3]); // Pastikan langkah 3 diteruskan
    
            case 3:
                $this->validate($request, [
                    'nomor_hak_bangun' => 'required|string|max:255',
                    'nomor_surat_ukur' => 'required|string|max:255',
                    'nomor_nib' => 'required|string|max:255',
                    'pengesahan_nib' => 'required|string|max:255',
                    'nomor_spp' => 'required|string|max:255',
                    'provinsi' => 'required|string|max:255',
                    'kota' => 'required|string|max:255',
                    'kecamatan' => 'required|string|max:255',
                    'kelurahan' => 'required|string|max:255',
                    'jalan' => 'required|string|max:255',
                    'alamat_lengkap' => 'required|string|max:500',
                    'harga_transaksi_tanah' => 'required|numeric',
                    'tanggal_pengajuan' => 'required|date'
                ]);
    
                $ajbData['objek'] = $request->only([
                    'nomor_hak_bangun', 'nomor_surat_ukur', 'nomor_nib', 'pengesahan_nib',
                    'nomor_spp', 'provinsi', 'kota', 'kecamatan', 'kelurahan', 'jalan', 'alamat_lengkap'
                ]);
    
                // Menghapus tanda titik untuk harga transaksi tanah
                $ajbData['harga_transaksi_tanah'] = str_replace('.', '', $request->input('harga_transaksi_tanah'));
                $ajbData['tanggal_pengajuan'] = $request->input('tanggal_pengajuan');
    
                // Debugging untuk memastikan data yang disimpan
                 // Pastikan data yang disimpan sudah benar
    
                $request->session()->put('ajb_data', $ajbData);
                $request->session()->put('step', 4);
                return redirect()->route('user.ajb.AJB', ['step' => 4]); // Pastikan langkah 4 diteruskan
    
            case 4:
                $berkas = [];
                foreach ($request->file() as $key => $file) {
                    if ($file) {
                        $berkas[$key] = $file->store('berkas', 'public');
                    }
                }
                $ajbData['berkas'] = $berkas;
                $request->session()->put('ajb_data', $ajbData);
                $request->session()->put('step', 5);
                return redirect()->route('user.ajb.AJB', ['step' => 5]); // Pastikan langkah 5 diteruskan
    
            case 5:
                if (!$request->has('konfirmasi_data')) {
                    return back()->withErrors(['konfirmasi_data' => 'Silakan centang kotak konfirmasi sebelum menyimpan data.'])
                                 ->withInput();
                }
                $ajbData['saksi'] = $request->only([
                    'nama_saksi', 'nik_saksi', 'tgl_lahir_saksi', 'tempat_lahir_saksi', 'alamat_saksi'
                ]);
                $request->session()->put('ajb_data', $ajbData);
    
                // SIMPAN KE DATABASE
                $penjual = Penjual::create(array_merge($ajbData['penjual'], ['user_id' => $user->id]));
                $pembeli = Pembeli::create(array_merge($ajbData['pembeli'], ['user_id' => $user->id]));
                $objek = ObjekTanah::create(array_merge($ajbData['objek'], ['user_id' => $user->id]));
                $berkas = BerkasAjb::create(array_merge($ajbData['berkas'], ['user_id' => $user->id]));
                $saksi = Saksi::create(array_merge($ajbData['saksi'], ['user_id' => $user->id]));
    
                PengajuanAjb::create([
                    'users_id' => $user->id,
                    'penjual_id' => $penjual->id,
                    'pembeli_id' => $pembeli->id,
                    'objekTanah_id' => $objek->id,
                    'berkas_id' => $berkas->id,
                    'saksi_id' => $saksi->id,
                    'harga_transaksi_tanah' => $ajbData['harga_transaksi_tanah'],
                    'tanggal_pengajuan' => $ajbData['tanggal_pengajuan'] ?? now()
                ]);
    
                $request->session()->forget(['ajb_data', 'step']);
    
                return redirect()->route('user.ajb.AJB')->with('success', 'Pengajuan AJB berhasil disimpan!');
        }
    
        // Pastikan redirect step yang sesuai
        return redirect()->route('user.ajb.AJB', ['step' => $step]);
    }
    

}
