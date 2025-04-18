@extends('user.layout.app')

@section('content')
<div class="page-content"> 
    <section class="section">
        <div class="card">
                    <div class="d-flex justify-content-end me-3 mb-3 mt-4">
                        <a href="{{ route('user.AJB') }}" class="btn btn-primary">tambah</a>
                    </div>
                    <h3 class="ms-4">Data Riwayat Pengajuan</h3>
                    <div class="card-body">
                        <!-- table contextual / colored -->
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Pembeli</th>
                                        <th>Nama Penjual</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Harga Transaksi</th>
                                        <th>Status</th>
                                        <th>aksi</th>
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
                                            <td>
                                                <a href="#" class="btn btn-sm btn-danger me-1" title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-success" title="Download">
                                                    <i class="bi bi-download"></i>
                                                </a>
                                            </td>
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

@endsection

