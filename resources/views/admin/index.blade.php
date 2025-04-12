@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Line Chart Pengajuan AJB per Minggu</h4>
    </div>
    <div class="card-body">
        <canvas id="ajbChart"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('ajbChart').getContext('2d');

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($weeks) !!}, // label harian, misal: ['2025-04-10', '2025-04-11', ...]
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
            scales: {
                x: {
                    stacked: true
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