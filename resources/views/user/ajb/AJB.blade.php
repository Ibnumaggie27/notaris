@extends('user.layout.app')

@section('content')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">inputan untuk pembuatan AJB</h4>
            </div>

            <div class="card-body">
                <h1>inputan obyek tanah</h1>
                <div class="row">
                    <div class="col-md-12">
                        @php $step = session('step', 1); @endphp
                @if ($step == 1)
                    <form method="POST" action="{{ route('user.ajb.step') }}">
                        @csrf
                        <input type="hidden" name="step" value="1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_penjual">Nama Penjual</label>
                                    <input type="text" class="form-control" id="nama_penjual" name="nama_penjual" placeholder="Nama Penjual">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik_penjual">NIK Penjual</label>
                                    <input type="text" class="form-control" id="nik_penjual" name="nik_penjual" placeholder="NIK Penjual" maxlength="16" minlength="16" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_lahir_penjual">Tanggal Lahir Penjual</label>
                                    <input type="date" class="form-control" id="tgl_lahir_penjual" name="tgl_lahir_penjual">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir_penjual">Tempat Lahir Penjual</label>
                                    <input type="text" class="form-control" id="tempat_lahir_penjual" name="tempat_lahir_penjual" placeholder="Tempat Lahir Penjual">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_istri_penjual">Nama Istri</label>
                                    <input type="text" class="form-control" id="nama_istri_penjual" name="nama_istri_penjual" placeholder="Nama Istri">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik_istri_penjual">NIK Istri</label>
                                    <input type="text" class="form-control" id="nik_istri_penjual" name="nik_istri_penjual" placeholder="NIK Istri" maxlength="16" minlength="16" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_lahir_istri_penjual">Tanggal Lahir Istri</label>
                                    <input type="date" class="form-control" id="tgl_lahir_istri_penjual" name="tgl_lahir_istri_penjual">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir_istri_penjual">Tempat Lahir Istri</label>
                                    <input type="text" class="form-control" id="tempat_lahir_istri_penjual" name="tempat_lahir_istri_penjual" placeholder="Tempat Lahir Istri">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat_penjual">Alamat Penjual</label>
                                    <textarea class="form-control" id="alamat_penjual" name="alamat_penjual" rows="3" placeholder="Alamat Penjual"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </form>
                @endif

                @if ($step == 2)
                <form method="POST" action="{{ route('user.ajb.step') }}">
                    @csrf
                    <input type="hidden" name="step" value="2">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Pembeli</label>
                                <input type="text" name="nama_pembeli" class="form-control" placeholder="Nama Pembeli">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIK Pembeli</label>
                                <input type="text" name="nik_pembeli" class="form-control" placeholder="NIK Pembeli" maxlength="16" minlength="16" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir Pembeli</label>
                                <input type="date" name="tgl_lahir_pembeli" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Lahir Pembeli</label>
                                <input type="text" name="tempat_lahir_pembeli" class="form-control" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat Pembeli</label>
                                <textarea name="alamat_pembeli" class="form-control" placeholder="Alamat Pembeli"></textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Next</button>
                </form>
                @endif

                @if ($step == 3)
                <form method="POST" action="{{ route('user.ajb.step') }}">
                    @csrf
                    <input type="hidden" name="step" value="3">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Hak Bangun</label>
                                <input type="text" name="nomor_hak_bangun" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Surat Ukur</label>
                                <input type="text" name="nomor_surat_ukur" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor NIB</label>
                                <input type="text" name="nomor_nib" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pengesahan NIB</label>
                                <input type="text" name="pengesahan_nib" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor SPP</label>
                                <input type="text" name="nomor_spp" class="form-control">
                            </div>
                        </div>

                        {{-- Lokasi --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" name="provinsi" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kota</label>
                                <input type="text" name="kota" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <input type="text" name="kelurahan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Jalan</label>
                            <input type="text" name="jalan" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Harga Transaksi Tanah</label>
                                <input type="text" name="harga_transaksi_tanah" id="harga_transaksi_tanah" class="form-control" oninput="formatRupiah(this)">
                            </div>
                        </div>                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Pengajuan</label>
                                <input type="date" name="tanggal_pengajuan" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" readonly>
                            </div>
                        </div>                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat Lengkap</label>
                                <textarea name="alamat_lengkap" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Next</button>
                </form>
                @endif

                @if ($step == 4)
                <form method="POST" action="{{ route('user.ajb.step') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="step" value="4">

                    <div class="row">
                        @foreach ([
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
                        ] as $name => $label)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ $label }}</label>
                                <input type="file" name="{{ $name }}" class="form-control">
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary">Next</button>
                </form>
                @endif
                
                @if ($step == 5)
                <form method="POST" action="{{ route('user.ajb.step') }}">
                    @csrf
                    <input type="hidden" name="step" value="5">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Saksi</label>
                                <input type="text" name="nama_saksi" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIK Saksi</label>
                                <input type="text" name="nik_saksi" class="form-control" maxlength="16" minlength="16" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir Saksi</label>
                                <input type="date" name="tgl_lahir_saksi" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Lahir Saksi</label>
                                <input type="text" name="tempat_lahir_saksi" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat Saksi</label>
                                <textarea name="alamat_saksi" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan Semua</button>
                </form>
                @endif

                    </div>
                </div>
            </div>
            {{-- <a href="{{ route('user.ajb.objektanah') }}" class="btn btn-success">objek tanah</a> --}}
        </div>
    </section>
    <div class="card-body">
        <nav aria-label="Step navigation">
            <ul class="pagination pagination-success justify-content-center" id="stepPagination">
                <li class="page-item"><a class="page-link" href="#" onclick="prevStep()">
                    <i class="bi bi-chevron-left"></i>
                </a></li>
                <li class="page-item"><a class="page-link" href="#" onclick="changeStep(1)">1</a></li>
                <li class="page-item"><a class="page-link" href="#" onclick="changeStep(2)">2</a></li>
                <li class="page-item"><a class="page-link" href="#" onclick="changeStep(3)">3</a></li>
                <li class="page-item"><a class="page-link" href="#" onclick="changeStep(4)">4</a></li>
                <li class="page-item"><a class="page-link" href="#" onclick="changeStep(5)">5</a></li>
                <li class="page-item"><a class="page-link" href="#" onclick="nextStep()">
                    <i class="bi bi-chevron-right"></i>
                </a></li>
            </ul>
        </nav>
    </div>
    
</div>

@endsection