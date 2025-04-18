@extends('admin.layout.app')

@section('content')
<div class="page-content"> 
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Data Pengajuan
                </h5>
                {{-- <div class="card-header-action">
                    <a href="{{ route('export.pengajuan-ajb') }}" class="btn btn-primary mb-3">
                        Download Excel
                    </a>
            </div> --}}
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
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Filtering Data</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <h6>ID Transaksi</h6>
                        <input class="form-control form-control-lg" type="text" placeholder="Masukkan ID" id="inputId" oninput="checkData()">
                    </div>
                    <div class="col-sm-4">
                        <h6>Nama Penjual</h6>
                        <input class="form-control" type="text" placeholder="Penjual" id="penjual" disabled>
                    </div>
                    <div class="col-sm-4">
                        <h6>Nama Pembeli</h6>
                        <input class="form-control form-control-sm" type="text" placeholder="Pembeli" id="pembeli" disabled>
                    </div>
                </div>
    
                <div class="mt-3" id="detailBtn" style="display: none;">
                    <button class="btn btn-info" onclick="showDetail()">Lihat Detail</button>

                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12 mt-3" id="detailCard" style="display: none;">
        <div class="card border border-primary">
            <div class="card-header bg-primary text-white">
                <h5>Detail Transaksi AJB</h5>
            </div>
            <div class="card-body mt-3">
                <p><strong>ID Transaksi:</strong> <span id="detailId"></span></p>
                <p><strong>Nama Penjual:</strong> <span id="detailPenjual"></span></p>
                <p><strong>Nama Pembeli:</strong> <span id="detailPembeli"></span></p>
                <p><strong>Alamat:</strong> <span id="detailAlamat"></span></p>
                <p><strong>Tanggal Transaksi:</strong> <span id="detailTanggal"></span></p>
                <p><strong>Status:</strong> <span id="detailStatus"></span></p>
                
                <div class="text-end mt-4">
                    <button class="btn btn-success" onclick="printDetail()">Cetak Data</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        const dummyData = {
    'AJB123': {
        penjual: 'Pak Joko',
        pembeli: 'Bu Ani',
        alamat: 'Jl. Merdeka No. 1',
        tanggal: '2024-10-10',
        status: 'Selesai'
    },
    'AJB456': {
        penjual: 'Pak Dedi',
        pembeli: 'Bu Rina',
        alamat: 'Jl. Raya Selatan No. 9',
        tanggal: '2024-09-20',
        status: 'Diproses'
    }
};

const inputId = document.getElementById('inputId');
const inputPenjual = document.getElementById('penjual'); // sudah sesuai
const inputPembeli = document.getElementById('pembeli'); // sudah sesuai
const detailBtn = document.getElementById('detailBtn');
const detailCard = document.getElementById('detailCard');

// Event ketika input ID berubah
inputId.addEventListener('input', function () {
    const id = this.value;
    if (dummyData[id]) {
        inputPenjual.value = dummyData[id].penjual;
        inputPenjual.disabled = true;

        inputPembeli.value = dummyData[id].pembeli;
        inputPembeli.disabled = true;

        detailBtn.style.display = 'inline-block';
    } else {
        inputPenjual.value = '';
        inputPenjual.disabled = false;

        inputPembeli.value = '';
        inputPembeli.disabled = false;

        detailBtn.style.display = 'none';
        detailCard.style.display = 'none';
    }
});

// Saat klik tombol lihat detail
function showDetail() {
    const id = inputId.value;
    const data = dummyData[id];

    if (data) {
        document.getElementById('detailId').textContent = id;
        document.getElementById('detailPenjual').textContent = data.penjual;
        document.getElementById('detailPembeli').textContent = data.pembeli;
        document.getElementById('detailAlamat').textContent = data.alamat;
        document.getElementById('detailTanggal').textContent = data.tanggal;
        document.getElementById('detailStatus').textContent = data.status;

        detailCard.style.display = 'block';
    }
}

    </script>
    
    
    <!-- Card untuk menampilkan detail data, disembunyikan awalnya -->


</div>
@endsection