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
                                <tbody class="text-center">
                                    <tr>
                                        <td>1</td>
                                        <td>Ahmad Hidayat</td>
                                        <td>Siti Aminah</td>
                                        <td>10-04-2025</td>
                                        <td>Rp 250.000.000</td>
                                        <td><span class="badge bg-warning text-dark">Menunggu</span></td>
                                        <td>
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="#" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-success" title="Download">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                            </div>
                                        </td>                               
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Doni Saputra</td>
                                        <td>Andi Rahman</td>
                                        <td>08-04-2025</td>
                                        <td>Rp 300.000.000</td>
                                        <td><span class="badge bg-success">Disetujui</span></td>
                                        <td>
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="#" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-success" title="Download">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                            </div>
                                        </td>                              
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Linda Kurnia</td>
                                        <td>Rina Sari</td>
                                        <td>05-04-2025</td>
                                        <td>Rp 200.000.000</td>
                                        <td><span class="badge bg-danger">Ditolak</span></td>
                                        <td>
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="#" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-success" title="Download">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                            </div>
                                        </td>                                                                     
                                    </tr>
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

