@extends('admin.layout.app')

@section('content')
<div class="page-content"> 
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Simple Datatable
                </h5>
                <div class="card-header-action">
                    <a href="{{ route('export.pengajuan-ajb') }}" class="btn btn-primary mb-3">
                        Download Excel
                    </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Pembeli</th>
                            <th>Nama Penjual</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Harga Transaksi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($pengajuanAjbs as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->pembeli->nama_pembeli ?? '-' }}</td>
                            <td>{{ $item->penjual->nama_penjual ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d-m-Y') }}</td>
                            <td>Rp {{ number_format($item->harga_transaksi_tanah, 0, ',', '.') }}</td>
                            <td>{{ $item->status ?? 'Menunggu' }}</td>                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>

    </section>
</div>
@endsection