@extends('admin.layout.app')

@section('content')
<div class="page-content"> 
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Pengajuan</h5>
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
                            <th>aksi</th>
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
                            <td>
                                <a href="{{ route('admin.pengajuan-ajb.detail', $item->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>                            
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

@push('scripts')
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#table1').DataTable();
    });
</script>
@endpush
