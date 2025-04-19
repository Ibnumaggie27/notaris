@extends('user.layout.app')

@section('content')
<div class="container">
    <h2>Pengajuan AJB - Step {{ $step ?? 1 }}</h2>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('user.ajb.submit') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="step" value="{{ $step ?? 1 }}">
        @php
    $step = $step ?? 1;
    @endphp

        @if($step == 1)
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_penjual">Nama Penjual</label>
                    <input type="text" class="form-control" id="nama_penjual" name="nama_penjual" placeholder="Nama Penjual"
                           value="{{ old('nama_penjual', $ajbData['penjual']['nama_penjual'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nik_penjual">NIK Penjual</label>
                    <input type="text" class="form-control" id="nik_penjual" name="nik_penjual" placeholder="NIK Penjual" maxlength="16" minlength="16" required 
                           oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                           value="{{ old('nik_penjual', $ajbData['penjual']['nik_penjual'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tgl_lahir_penjual">Tanggal Lahir Penjual</label>
                    <input type="date" class="form-control" id="tgl_lahir_penjual" name="tgl_lahir_penjual"
                           value="{{ old('tgl_lahir_penjual', $ajbData['penjual']['tgl_lahir_penjual'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tempat_lahir_penjual">Tempat Lahir Penjual</label>
                    <input type="text" class="form-control" id="tempat_lahir_penjual" name="tempat_lahir_penjual" placeholder="Tempat Lahir Penjual"
                           value="{{ old('tempat_lahir_penjual', $ajbData['penjual']['tempat_lahir_penjual'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_istri_penjual">Nama Istri</label>
                    <input type="text" class="form-control" id="nama_istri_penjual" name="nama_istri_penjual" placeholder="Nama Istri"
                           value="{{ old('nama_istri_penjual', $ajbData['penjual']['nama_istri_penjual'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nik_istri_penjual">NIK Istri</label>
                    <input type="text" class="form-control" id="nik_istri_penjual" name="nik_istri_penjual" placeholder="NIK Istri" maxlength="16" minlength="16" required 
                           oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                           value="{{ old('nik_istri_penjual', $ajbData['penjual']['nik_istri_penjual'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tgl_lahir_istri_penjual">Tanggal Lahir Istri</label>
                    <input type="date" class="form-control" id="tgl_lahir_istri_penjual" name="tgl_lahir_istri_penjual"
                           value="{{ old('tgl_lahir_istri_penjual', $ajbData['penjual']['tgl_lahir_istri_penjual'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tempat_lahir_istri_penjual">Tempat Lahir Istri</label>
                    <input type="text" class="form-control" id="tempat_lahir_istri_penjual" name="tempat_lahir_istri_penjual" placeholder="Tempat Lahir Istri"
                           value="{{ old('tempat_lahir_istri_penjual', $ajbData['penjual']['tempat_lahir_istri_penjual'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="alamat_penjual">Alamat Penjual</label>
                    <textarea class="form-control" id="alamat_penjual" name="alamat_penjual" rows="3" placeholder="Alamat Penjual">{{ old('alamat_penjual', $ajbData['penjual']['alamat_penjual'] ?? '') }}</textarea>
                </div>
            </div>
        </div>        
            <!-- Tambah field lainnya sesuai model Penjual -->

        @elseif(isset($step) && $step == 2)
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_pembeli">Nama Pembeli</label>
                    <input type="text" name="nama_pembeli" class="form-control" placeholder="Nama Pembeli"
                           value="{{ old('nama_pembeli', $ajbData['pembeli']['nama_pembeli'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nik_pembeli">NIK Pembeli</label>
                    <input type="text" name="nik_pembeli" class="form-control" placeholder="NIK Pembeli" maxlength="16" minlength="16" required 
                           oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                           value="{{ old('nik_pembeli', $ajbData['pembeli']['nik_pembeli'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tgl_lahir_pembeli">Tanggal Lahir Pembeli</label>
                    <input type="date" name="tgl_lahir_pembeli" class="form-control"
                           value="{{ old('tgl_lahir_pembeli', $ajbData['pembeli']['tgl_lahir_pembeli'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tempat_lahir_pembeli">Tempat Lahir Pembeli</label>
                    <input type="text" name="tempat_lahir_pembeli" class="form-control" placeholder="Tempat Lahir"
                           value="{{ old('tempat_lahir_pembeli', $ajbData['pembeli']['tempat_lahir_pembeli'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="alamat_pembeli">Alamat Pembeli</label>
                    <textarea name="alamat_pembeli" class="form-control" placeholder="Alamat Pembeli">{{ old('alamat_pembeli', $ajbData['pembeli']['alamat_pembeli'] ?? '') }}</textarea>
                </div>
            </div>
        </div>
        
            <!-- Tambah field lainnya sesuai model Pembeli -->

        @elseif(isset($step) && $step == 3)
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nomor_hak_bangun">Nomor Hak Bangun</label>
                    <input type="text" name="nomor_hak_bangun" class="form-control" 
                           value="{{ old('nomor_hak_bangun', $ajbData['objek']['nomor_hak_bangun'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nomor_surat_ukur">Nomor Surat Ukur</label>
                    <input type="text" name="nomor_surat_ukur" class="form-control" 
                           value="{{ old('nomor_surat_ukur', $ajbData['objek']['nomor_surat_ukur'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nomor_nib">Nomor NIB</label>
                    <input type="text" name="nomor_nib" class="form-control" 
                           value="{{ old('nomor_nib', $ajbData['objek']['nomor_nib'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pengesahan_nib">Pengesahan NIB</label>
                    <input type="text" name="pengesahan_nib" class="form-control" 
                           value="{{ old('pengesahan_nib', $ajbData['objek']['pengesahan_nib'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nomor_spp">Nomor SPP</label>
                    <input type="text" name="nomor_spp" class="form-control" 
                           value="{{ old('nomor_spp', $ajbData['objek']['nomor_spp'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" name="provinsi" class="form-control" 
                           value="{{ old('provinsi', $ajbData['objek']['provinsi'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" name="kota" class="form-control" 
                           value="{{ old('kota', $ajbData['objek']['kota'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" 
                           value="{{ old('kecamatan', $ajbData['objek']['kecamatan'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kelurahan">Kelurahan</label>
                    <input type="text" name="kelurahan" class="form-control" 
                           value="{{ old('kelurahan', $ajbData['objek']['kelurahan'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jalan">Jalan</label>
                    <input type="text" name="jalan" class="form-control" 
                           value="{{ old('jalan', $ajbData['objek']['jalan'] ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="harga_transaksi_tanah">Harga Transaksi Tanah</label>
                    <input type="text" name="harga_transaksi_tanah" id="harga_transaksi_tanah" class="form-control" 
                           value="{{ old('harga_transaksi_tanah', $ajbData['harga_transaksi_tanah'] ?? '') }}"
                           oninput="formatRupiah(this)">
                </div>
            </div>                        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                    <input type="date" name="tanggal_pengajuan" class="form-control" 
                           value="{{ old('tanggal_pengajuan', \Carbon\Carbon::now()->format('Y-m-d')) }}" readonly>
                </div>
            </div>                        
            <div class="col-md-12">
                <div class="form-group">
                    <label for="alamat_lengkap">Alamat Lengkap</label>
                    <textarea name="alamat_lengkap" class="form-control">{{ old('alamat_lengkap', $ajbData['objek']['alamat_lengkap'] ?? '') }}</textarea>
                </div>
            </div>
        </div>
        
            <!-- Tambah field lainnya sesuai model ObjekTanah -->

        @elseif(isset($step) && $step == 4)
        <div class="row">
            <div class="mb-6">
                <label for="file_ktp_penjual">File KTP Penjual</label>
                <input type="file" name="file_ktp_penjual" class="form-control" 
                       {{ session('ajb.berkas.file_ktp_penjual') ? '' : 'required' }}>
                @if(session('ajb.berkas.file_ktp_penjual'))
                    <small>Sudah upload: {{ session('ajb.berkas.file_ktp_penjual') }}</small>
                @endif
            </div>
            <div class="mb-6">
                <label for="file_ktp_istri_penjual">File KTP Istri Penjual</label>
                <input type="file" name="file_ktp_istri_penjual" class="form-control" 
                       {{ session('ajb.berkas.file_ktp_istri_penjual') ? '' : 'required' }}>
                @if(session('ajb.berkas.file_ktp_istri_penjual'))
                    <small>Sudah upload: {{ session('ajb.berkas.file_ktp_istri_penjual') }}</small>
                @endif
            </div>
            <div class="mb-6">
                <label for="file_kk_penjual">File Kartu Keluarga Penjual</label>
                <input type="file" name="file_kk_penjual" class="form-control" 
                       {{ session('ajb.berkas.file_kk_penjual') ? '' : 'required' }}>
                @if(session('ajb.berkas.file_kk_penjual'))
                    <small>Sudah upload: {{ session('ajb.berkas.file_kk_penjual') }}</small>
                @endif
            </div>
            <div class="mb-6">
                <label for="file_ktp_pembeli">File Ktp Pembeli</label>
                <input type="file" name="file_ktp_pembeli" class="form-control" 
                       {{ session('ajb.berkas.file_ktp_pembeli') ? '' : 'required' }}>
                @if(session('ajb.berkas.file_ktp_pembeli'))
                    <small>Sudah upload: {{ session('ajb.berkas.file_ktp_pembeli') }}</small>
                @endif
            </div>
            <div class="mb-6">
                <label for="file_kk_pembeli">File Kartu Keluarga Pembeli</label>
                <input type="file" name="file_kk_pembeli" class="form-control" 
                       {{ session('ajb.berkas.file_kk_pembeli') ? '' : 'required' }}>
                @if(session('ajb.berkas.file_kk_pembeli'))
                    <small>Sudah upload: {{ session('ajb.berkas.file_kk_pembeli') }}</small>
                @endif
            </div>
            <div class="mb-6">
                <label for="file_akta_nikah">File Akta Nikah</label>
                <input type="file" name="file_akta_nikah" class="form-control" 
                       {{ session('ajb.berkas.file_akta_nikah') ? '' : 'required' }}>
                @if(session('ajb.berkas.file_akta_nikah'))
                    <small>Sudah upload: {{ session('ajb.berkas.file_akta_nikah') }}</small>
                @endif
            </div>
            <div class="mb-6">
                <label for="file_sertifikat">File Sertifikat</label>
                <input type="file" name="file_sertifikat" class="form-control" 
                       {{ session('ajb.berkas.file_sertifikat') ? '' : 'required' }}>
                @if(session('ajb.berkas.file_sertifikat'))
                    <small>Sudah upload: {{ session('ajb.berkas.file_sertifikat') }}</small>
                @endif
            </div>
            <div class="mb-6">
                <label for="file_bukti_pbb">File Bukti PBB</label>
                <input type="file" name="file_bukti_pbb" class="form-control" 
                       {{ session('ajb.berkas.file_bukti_pbb') ? '' : 'required' }}>
                @if(session('ajb.berkas.file_bukti_pbb'))
                    <small>Sudah upload: {{ session('ajb.berkas.file_bukti_pbb') }}</small>
                @endif
            </div>
            <div class="mb-6">
                <label for="file_imb">File IMB</label>
                <input type="file" name="file_imb" class="form-control" 
                       {{ session('ajb.berkas.file_imb') ? '' : 'required' }}>
                @if(session('ajb.berkas.file_imb'))
                    <small>Sudah upload: {{ session('ajb.berkas.file_imb') }}</small>
                @endif
            </div>
            <div class="mb-6">
                <label for="file_persetujuan">File Persetujuan</label>
                <input type="file" name="file_persetujuan" class="form-control" 
                       {{ session('ajb.berkas.file_persetujuan') ? '' : 'required' }}>
                @if(session('ajb.berkas.file_persetujuan'))
                    <small>Sudah upload: {{ session('ajb.berkas.file_persetujuan') }}</small>
                @endif
            </div>
            <div class="mb-6">
                <label for="file_dokumen_lainnya">File Dokumen Lainnya</label>
                <input type="file" name="file_dokumen_lainnya" class="form-control" 
                       {{ session('ajb.berkas.file_dokumen_lainnya') ? '' : 'required' }}>
                @if(session('ajb.berkas.file_dokumen_lainnya'))
                    <small>Sudah upload: {{ session('ajb.berkas.file_dokumen_lainnya') }}</small>
                @endif
            </div>
        </div>
        
            <!-- Tambah field lainnya sesuai model BerkasAjb -->

        @elseif(isset($step) && $step == 5)
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Saksi</label>
                    <input type="text" name="nama_saksi" class="form-control" value="{{ old('nama_saksi', session('ajb.saksi.nama_saksi')) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>NIK Saksi</label>
                    <input type="text" name="nik_saksi" class="form-control" maxlength="16" minlength="16" required 
                           value="{{ old('nik_saksi', session('ajb.saksi.nik_saksi')) }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Lahir Saksi</label>
                    <input type="date" name="tgl_lahir_saksi" class="form-control" value="{{ old('tgl_lahir_saksi', session('ajb.saksi.tgl_lahir_saksi')) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tempat Lahir Saksi</label>
                    <input type="text" name="tempat_lahir_saksi" class="form-control" value="{{ old('tempat_lahir_saksi', session('ajb.saksi.tempat_lahir_saksi')) }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Alamat Saksi</label>
                    <textarea name="alamat_saksi" class="form-control">{{ old('alamat_saksi', session('ajb.saksi.alamat_saksi')) }}</textarea>
                </div>
            </div>
        <div class="col-md-12">
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="konfirmasiData" name="konfirmasi_data" value="1" required>
                <label class="form-check-label" for="konfirmasiData">
                    Yakin data sudah sesuai?
                </label>
            </div>
        </div>
        </div>
        @endif

        <div class="d-flex justify-content-between mt-4">
            @if(isset($step) && $step > 1)
                <button type="submit" name="action" value="back" class="btn btn-secondary">Kembali</button>
            @endif

            <button type="submit" name="action" value="next" class="btn btn-primary">
                {{ (isset($step) && $step == 5) ? 'Simpan & Selesai' : 'Lanjut' }}
            </button>
        </div>
    </form>
</div>
@endsection
