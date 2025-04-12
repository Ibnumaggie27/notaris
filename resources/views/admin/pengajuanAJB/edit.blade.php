@extends('admin.layout.app')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Edit Pengajuan AJB</h2>

    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Data Penjual
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="">
                            <div class="accordion-body">

                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Data Objek Tanah
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <label for="harga_transaksi_tanah" class="form-label">Harga Transaksi Tanah</label>
                                    <input type="number" name="harga_transaksi_tanah" id="harga_transaksi_tanah" class="form-control" value="{{ old('harga_transaksi_tanah', $pengajuanAjb->harga_transaksi_tanah) }}">
                                </div>
                                </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Data File
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">

                                </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Data Saksi
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">

                                </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
    {{-- <form action="{{ route('admin.pengajuan-ajb.update', $pengajuanAjb->id) }}" method="POST">
        @csrf
        @method('PUT')

        

        <div class="mb-3">
            <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
            <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan" class="form-control" value="{{ old('tanggal_pengajuan', $pengajuanAjb->tanggal_pengajuan) }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="pengajuan" {{ $pengajuanAjb->status == 'pengajuan' ? 'selected' : '' }}>Pengajuan</option>
                <option value="proses" {{ $pengajuanAjb->status == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ $pengajuanAjb->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="tolak" {{ $pengajuanAjb->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form> --}}

    <a href="{{ route('admin.dataPJB') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>

@endsection