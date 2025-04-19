@extends('admin.layout.app')

@section('content')
{{-- ini bagian card profile --}}
<div class="row">
    <!-- Card 1 -->
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="card-title">Jumlah Pengajuan</h5>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah Pengajuan</label>
                        <div class="progress">
                            <div class="progress-bar bg-primary" style="width: 75%;">112.000</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah Dalam Proses</label>
                        <div class="progress">
                            <div class="progress-bar bg-warning text-dark" style="width: 50%;">80.000</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah Disetujui</label>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 90%;">183.000</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah Ditolak</label>
                        <div class="progress">
                            <div class="progress-bar bg-danger" style="width: 5%;">112</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h4>Statistik Pengajuan</h4>
            </div>
            <div class="card-body d-flex align-items-center justify-content-center">
                <canvas id="pengajuanPieChart" style="max-width: 100%; max-height: 300px;"></canvas>
            </div>
        </div>
    </div>

    <!-- Card 3 -->
</div>
<div class="col-md-12 mb-4">
    <div class="card h-100">
        <div class="card-header">
            <h5 class="card-title">Line Chart Pengajuan AJB per Minggu</h5>
        </div>
        <div class="card-body d-flex align-items-center justify-content-center">
            <div class="chart-container w-100">
                <canvas id="ajbChart"></canvas>
            </div>
        </div>
    </div>
</div>    
<div class="col-md-12 mb-4">
    <div class="card h-100">
        <div class="card-header">
            <h5 class="card-title">Data Pengajuan</h5>
        </div>
        <div class="card-body d-flex flex-column justify-content-between">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Harga Transaksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>1</td>
                            <td>10-04-2025</td>
                            <td>Rp 250.000.000</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>08-04-2025</td>
                            <td>Rp 300.000.000</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>05-04-2025</td>
                            <td>Rp 200.000.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



{{-- ini bagian chart --}}

{{-- ini bagian tabel --}}


@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // ===== BAR CHART =====
    const ctx = document.getElementById('ajbChart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Minggu', 'Minggu', 'Minggu', 'Minggu'],
        datasets: [{
            label: 'Jumlah Pengajuan',
            data: [1, 2, 3, 5],
            borderColor: '#ff6600',
            backgroundColor: 'rgba(255, 102, 0, 0.2)',
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false, // PENTING!
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        // Menghilangkan format ribuan (misalnya, 1,000 -> 1000)
                        return value;
                    },
                    stepSize: 1 // Menetapkan langkah angka, supaya tidak ada angka desimal
                }
            }
        }
    }
});




    // ===== PIE CHART =====
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

    dataDummy.forEach(item => {
        if (item.status === 'Disetujui') disetujui++;
        else if (item.status === 'Ditolak') ditolak++;
        else if (item.status === 'Menunggu') menunggu++;
    });

    const ctxPie = document.getElementById('pengajuanPieChart').getContext('2d');
    const pengajuanPieChart = new Chart(ctxPie, {
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
                        color: '#00ffff' // warna label
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
</script>
@endsection
