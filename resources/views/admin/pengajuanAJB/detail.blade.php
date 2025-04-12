@extends('admin.layout.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Detail Pengajuan AJB</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informasi Pengajuan AJB</h5>
    
            <!-- Form untuk ubah status -->
            <form action="{{ route('admin.pengajuan-ajb.update', $pengajuanAjb->id) }}" method="POST">
                @csrf
                @method('PUT')
    
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Data Penjual
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Nama Penjual:</strong> {{ $pengajuanAjb->penjual->nama_penjual ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Nik Penjual:</strong> {{ $pengajuanAjb->penjual->nik_penjual ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Tanggal Lahir Penjual:</strong> {{ $pengajuanAjb->penjual->tgl_lahir_penjual ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Tempat Lahir Penjual:</strong> {{ $pengajuanAjb->penjual->tempat_lahir_penjual ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Nama Istri Penjual:</strong> {{ $pengajuanAjb->penjual->nama_istri_penjual ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Nik Istri Penjual:</strong> {{ $pengajuanAjb->penjual->nik_istri_penjual ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Tanggal Lahir Istri Penjual:</strong> {{ $pengajuanAjb->penjual->tgl_lahir_istri_penjual ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Tempat Lahir Istri Penjual:</strong> {{ $pengajuanAjb->penjual->tempat_lahir_istri_penjual ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Alamat Lengkap:</strong> {{ $pengajuanAjb->penjual->alamat_lengkap ?? '-' }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Data Pembeli
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Nama Pembeli:</strong> {{ $pengajuanAjb->pembeli->nama_pembeli ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Nik Pembeli:</strong> {{ $pengajuanAjb->pembeli->nik_pembeli ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Tanggal Lahir Pembeli:</strong> {{ $pengajuanAjb->pembeli->tgl_lahir_pembeli ?? '-' }}</li>
                                    <li class="list-group-item"><strong>tempat Lahir Pembeli:</strong> {{ $pengajuanAjb->pembeli->tempat_lahir_pembeli ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Alamat Pembeli:</strong> {{ $pengajuanAjb->pembeli->alamat_pembeli ?? '-' }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Data Objek Tanah
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Nomor Hak Bangun:</strong> {{ $pengajuanAjb->objekTanah->nomor_hak_bangun ?? '-' }}</li>
                                    <li class="list-group-item"><strong>nomor Surat Ukur:</strong> {{ $pengajuanAjb->objekTanah->nomor_surat_ukur ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Nomor NIB:</strong> {{ $pengajuanAjb->objekTanah->nomor_nib ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Pengesahan NIB:</strong> {{ $pengajuanAjb->objekTanah->pengesahan_nib ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Nomor SPP:</strong> {{ $pengajuanAjb->objekTanah->nomor_spp ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Provinsi:</strong> {{ $pengajuanAjb->objekTanah->provinsi ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Kota:</strong> {{ $pengajuanAjb->objekTanah->kota ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Kecamatan:</strong> {{ $pengajuanAjb->objekTanah->kecamatan ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Kelurahan:</strong> {{ $pengajuanAjb->objekTanah->kelurahan ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Jalan:</strong> {{ $pengajuanAjb->objekTanah->jalan ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Alamat Lengkap:</strong> {{ $pengajuanAjb->objekTanah->alamat_lengkap ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Harga Transaksi:</strong> Rp {{ number_format($pengajuanAjb->harga_transaksi_tanah, 0, ',', '.') }}</li>
                                    <li class="list-group-item"><strong>Tanggal Pengajuan:</strong> {{ $pengajuanAjb->tanggal_pengajuan ?? '-' }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                Data File
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    @php
                                    $berkas = $pengajuanAjb->berkas;
                                @endphp
                    
                    @if($berkas)
                    <div class="row">
                        @foreach([
                            'file_ktp_penjual' => 'KTP Penjual',
                            'file_ktp_istri_penjual' => 'KTP Istri Penjual',
                            'file_kk_penjual' => 'KK Penjual',
                            'file_ktp_pembeli' => 'KTP Pembeli',
                            'file_kk_pembeli' => 'KK Pembeli',
                            'file_akta_nikah' => 'Akta Nikah',
                            'file_sertifikat' => 'Sertifikat',
                            'file_bukti_pbb' => 'Bukti PBB',
                            'file_imb' => 'IMB',
                            'file_persetujuan' => 'Persetujuan',
                            'file_dokumen_lainnya' => 'Dokumen Lainnya',
                        ] as $field => $label)
                            @if(!empty($berkas->$field))
                                <div class="col-md-3 mb-4 text-center">
                                    <strong>{{ $label }}</strong>
                                    <div>
                                        <a href="{{ asset('storage/' . $berkas->$field) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $berkas->$field) }}" class="img-fluid border" style="width: 150px; height: 200px; object-fit: cover;">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <p class="text-danger">Berkas belum tersedia.</p>
                @endif
                
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                Data Saksi
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Nama Saksi:</strong> {{ $pengajuanAjb->saksi->nama_saksi ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Nik Saksi:</strong> {{ $pengajuanAjb->saksi->nik_saksi ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Tanggal Lahir Saksi:</strong> {{ $pengajuanAjb->saksi->tgl_lahir_saksi ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Tempat Lahir Saksi:</strong> {{ $pengajuanAjb->saksi->tempat_lahir_saksi ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Alamat Saksi:</strong> {{ $pengajuanAjb->saksi->alamat_saksi ?? '-' }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <li class="list-group-item">
                    <strong>Status:</strong>
                    @if(auth()->user()->role !== 'superAdmin')
                        <select name="status" class="form-select mt-2">
                            <option value="pengajuan" {{ $pengajuanAjb->status == 'pengajuan' ? 'selected' : '' }}>Pengajuan</option>
                            <option value="proses" {{ $pengajuanAjb->status == 'proses' ? 'selected' : '' }}>Proses</option>
                            <option value="selesai" {{ $pengajuanAjb->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="tolak" {{ $pengajuanAjb->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
                        </select>
                    @else
                        <p>{{ ucfirst($pengajuanAjb->status) }}</p> <!-- Menampilkan status secara statik untuk superAdmin -->
                    @endif
                </li>
                
                <!-- Tombol simpan -->
                @if(auth()->user()->role !== 'superAdmin')
                    <button type="submit" class="btn btn-success mt-3">Simpan</button>
                @endif
            </form>
        </div>
    </div>
    

    <a href="{{ route('admin.dataPJB') }}" class="btn btn-secondary mt-3">Kembali</a>
    <a href="{{ route('admin.pengajuan-ajb.edit', $pengajuanAjb->id) }}" class="btn btn-success mt-3">Edit</a>

</div>
@endsection
