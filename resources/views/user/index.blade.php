@extends('user.layout.app')

@section('content')

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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </section>
    </div>
</div>

@endsection