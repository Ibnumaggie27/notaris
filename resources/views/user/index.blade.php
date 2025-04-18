@extends('user.layout.app')

@section('content')
<div class="row">
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon purple mb-2">
                            <i class="fa-solid fa-file"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">jumlah Pengajuan</h6>
                        <h6 class="font-extrabold mb-0">112.000</h6>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card"> 
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon blue mb-2">
                            <i class="fa-solid fa-check"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">jumlah Yang di Stujui</h6>
                        <h6 class="font-extrabold mb-0">183.000</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon green mb-2">
                            <i class="fas fa-hourglass-half"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Jumlah Dalam Proses</h6>
                        <h6 class="font-extrabold mb-0">80.000</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon red mb-2">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Jumlah Yang di Tolak</h6>
                        <h6 class="font-extrabold mb-0">112</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-heading">
    <div class="page-content"> 
        <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <!-- table contextual / colored -->
                            <div class="table-responsive">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pembeli</th>
                                            <th>Nama Penjual</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Harga Transaksi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $dummyData = [
                                                [
                                                    'nama_pembeli' => 'Rina Andriani',
                                                    'nama_penjual' => 'Budi Santoso',
                                                    'tanggal_pengajuan' => '2025-04-10',
                                                    'harga_transaksi' => 250000000,
                                                    'status' => 'Disetujui',
                                                ],
                                                [
                                                    'nama_pembeli' => 'Agus Saputra',
                                                    'nama_penjual' => 'Siti Nurhaliza',
                                                    'tanggal_pengajuan' => '2025-04-11',
                                                    'harga_transaksi' => 175000000,
                                                    'status' => 'Menunggu',
                                                ],
                                                [
                                                    'nama_pembeli' => 'Lina Marlina',
                                                    'nama_penjual' => 'Ujang Komar',
                                                    'tanggal_pengajuan' => '2025-04-12',
                                                    'harga_transaksi' => 300000000,
                                                    'status' => 'Ditolak',
                                                ],
                                            ];
                                        @endphp
            
                                        @foreach ($dummyData as $index => $ajb)
                                            <tr class="text-center">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $ajb['nama_pembeli'] }}</td>
                                                <td>{{ $ajb['nama_penjual'] }}</td>
                                                <td>{{ \Carbon\Carbon::parse($ajb['tanggal_pengajuan'])->format('d-m-Y') }}</td>
                                                <td>Rp {{ number_format($ajb['harga_transaksi'], 0, ',', '.') }}</td>
                                                <td>{{ $ajb['status'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    {{-- pemanggilan data asli --}}
                                    {{-- <tbody>
                                        @foreach ($pengajuanAjbs as $index => $ajb)
                                            <tr class="text-center">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $ajb->pembeli->nama_pembeli ?? '-' }}</td>
                                                <td>{{ $ajb->penjual->nama_penjual ?? '-' }}</td>
                                                <td>{{ \Carbon\Carbon::parse($ajb->tanggal_pengajuan)->format('d-m-Y') }}</td>
                                                <td>Rp {{ number_format($ajb->harga_transaksi_tanah, 0, ',', '.') }}</td>
                                                <td>{{ $ajb->status ?? 'Menunggu' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody> --}}
                                </table>
                            </div>
                        </div>
                    </div>
        </section>
    </div>
</div>

@endsection