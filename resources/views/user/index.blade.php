@extends('user.layout.app')

@section('content')

<div class="row">
    <!-- Kolom 8 untuk Card Timeline -->
    <div class="col-md-6">
        <div class="row">
            <!-- Card 1 -->
            <div class="col-12 col-md-6 mb-4">
                <div class="card h-100 p-3">
                    <div class="card-body mt-5 text-center text-primary">
                        <i class="fas fa-file fa-3x"></i>
                        <div class="fs-4">120.000 Pengajuan</div>
                    </div>
                </div>
            </div>
    
            <!-- Card 2 -->
            <div class="col-12 col-md-6 mb-4">
                <div class="card h-100 p-3">
                    <div class="card-body mt-5 text-center text-warning">
                        <i class="fas fa-hourglass-half fa-3x"></i>
                        <div class="fs-4">120.000 Proses</div>
                    </div>
                </div>
            </div>
    
            <!-- Card 3 -->
            <div class="col-12 col-md-6 mb-4">
                <div class="card h-100 p-3">
                    <div class="card-body mt-5 text-center text-success">
                        <i class="fas fa-check-circle fa-3x"></i>
                        <div class="fs-4">120.000 Diterima</div>
                    </div>
                </div>
            </div>
    
            <!-- Card 4 -->
            <div class="col-12 col-md-6 mb-4">
                <div class="card h-100 p-3">
                    <div class="card-body mt-5 text-center text-danger">
                        <i class="fas fa-times-circle fa-3x"></i>
                        <div class="fs-4">120.000 Ditolak</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

    <!-- Kolom 4 untuk Chart -->
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h4>Statistik Pengajuan</h4>
            </div>
            <div style="width: 100%; max-width: 350px; height: 350px; margin: auto;">
                <canvas id="pengajuanPieChart"></canvas>
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
                                <table class="table">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pembeli</th>
                                            <th>Nama Penjual</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Harga Transaksi</th>
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
                                                ],
                                                [
                                                    'nama_pembeli' => 'Agus Saputra',
                                                    'nama_penjual' => 'Siti Nurhaliza',
                                                    'tanggal_pengajuan' => '2025-04-11',
                                                    'harga_transaksi' => 175000000,
                                                ],
                                                [
                                                    'nama_pembeli' => 'Lina Marlina',
                                                    'nama_penjual' => 'Ujang Komar',
                                                    'tanggal_pengajuan' => '2025-04-12',
                                                    'harga_transaksi' => 300000000,
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
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data Dummy
    const dataDummy = [
        { status: 'Disetujui' },
        { status: 'Disetujui' },
        { status: 'Ditolak' },
        { status: 'Menunggu' },
        { status: 'Disetujui' },
        { status: 'Menunggu' },
        { status: 'Ditolak' },
        { status: 'Menunggu' },
        { status: 'Disetujui' }
    ];

    let disetujui = 0;
    let ditolak = 0;
    let menunggu = 0;

    // Looping untuk menghitung status
    dataDummy.forEach(item => {
        if (item.status === 'Disetujui') disetujui++;
        else if (item.status === 'Ditolak') ditolak++;
        else if (item.status === 'Menunggu') menunggu++;
    });

    // Fungsi untuk mendeteksi tema (gelap atau terang)
    function getLabelColor() {
        return document.body.classList.contains('dark-theme') ? '#ffffff' : '#000000';
    }

    // Ambil context dari chart
    const ctx = document.getElementById('pengajuanPieChart').getContext('2d');
    const pengajuanPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Disetujui', 'Menunggu', 'Ditolak'],
            datasets: [{
                label: 'Jumlah Pengajuan',
                data: [disetujui, menunggu, ditolak],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)', // biru
                    'rgba(255, 206, 86, 0.7)', // kuning
                    'rgba(255, 99, 132, 0.7)'  // merah
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: getLabelColor() // Menggunakan fungsi getLabelColor untuk mendeteksi tema
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let total = disetujui + menunggu + ditolak;
                            let percentage = (context.parsed / total * 100).toFixed(1) + '%';
                            return context.label + ': ' + context.parsed + ' (' + percentage + ')';
                        }
                    }
                }
            }
        }
    });

    // Fungsi untuk memperbarui tema saat tema berubah
    function updateChartTheme() {
        pengajuanPieChart.options.plugins.legend.labels.color = getLabelColor();
        pengajuanPieChart.update();
    }

    // Memantau perubahan tema dengan event listener (misalnya dengan toggle tema)
    const themeToggleButton = document.querySelector('#theme-toggle'); // Pastikan ada tombol toggle tema
    if (themeToggleButton) {
        themeToggleButton.addEventListener('click', function() {
            // Tunggu sebentar setelah toggle, baru update chart
            setTimeout(updateChartTheme, 300);
        });
    }

</script>
@endpush




@endsection