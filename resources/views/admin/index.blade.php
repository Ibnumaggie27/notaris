@extends('admin.layout.app')

@section('content')
{{-- ini bagian card profile --}}
<div class="row">
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon purple mb-2">
                            <i class="iconly-boldShow"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Jumlah Pengajuan</h6>
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
                            <i class="iconly-boldProfile"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">jumlah Pengajuan Dalam Proses</h6>
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
                            <i class="iconly-boldAdd-User"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Jumlah Pengajuan di Stujui</h6>
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
                            <i class="iconly-boldBookmark"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">jumlah Pengajuan di Tolak</h6>
                        <h6 class="font-extrabold mb-0">112</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ini bagian chart --}}
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Line Chart Pengajuan AJB per Minggu</h4>
    </div>
    <div class="card-body">
        <div class="chart-container">
            <canvas id="ajbChart"></canvas>
        </div>
    </div>
</div>

{{-- ini bagian tabel --}}
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
                        <tr>
                            <td>1</td>
                            <td>Ahmad Hidayat</td>
                            <td>Siti Aminah</td>
                            <td>10-04-2025</td>
                            <td>Rp 250.000.000</td>
                            <td><span class="badge bg-warning text-dark">Menunggu</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
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
                                <a href="#" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
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
                                <a href="#" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>                            
                        </tr>
                    </tbody>
                    


                    {{-- pemanggilan data asli --}}
                    {{-- <tbody class="text-center">
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
                    </tbody> --}}
                </table>
            </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('ajbChart').getContext('2d');

    const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($weeks) !!},
        datasets: [
            @foreach($chartData as $status => $data)
            {
                label: '{{ ucfirst($status) }}',
                data: {!! json_encode(array_values($data)) !!},
                backgroundColor: '{{ ['pengajuan' => '#f39c12', 'proses' => '#3498db', 'selesai' => '#2ecc71', 'tolak' => '#e74c3c'][$status] }}',
                stack: 'stack1',
            },
            @endforeach
        ]
    },
    options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        legend: {
            position: 'bottom'
        }
    },
    scales: {
        x: {
            stacked: true,
            ticks: {
                callback: function(value, index, ticks) {
                    const label = this.getLabelForValue(value);
                    return label.split('(')[0].trim(); // hanya ambil "Minggu ke-XX"
                },
                autoSkip: true,
                maxRotation: 0,
                minRotation: 0,
                font: {
                    size: 10
                }
            }
        },
        y: {
            beginAtZero: true,
            stacked: true,
            precision: 0
        }
    }
}
});

</script>

@endsection