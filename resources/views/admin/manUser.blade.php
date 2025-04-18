@extends('admin.layout.app')

@section('content')
<div class="page-content"> 
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Manajemen User</h5>
            </div>
            <div class="d-flex justify-content-end me-3 mb-3">
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary">tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($adminUsers as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
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
    <div class="row" id="basic-table">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Admin</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Emali</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-bold-500">Ahmad Rizky</td>
                                        <td>ahmad.rizky@example.com</td>
                                        <td class="text-bold-500">admin</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Dewi Lestari</td>
                                        <td>dewi.lestari@example.com</td>
                                        <td class="text-bold-500">admin</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Bagus Saputra</td>
                                        <td>bagus.saputra@example.com</td>
                                        <td class="text-bold-500">admin</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Siti Nurhaliza</td>
                                        <td>siti.nurhaliza@example.com</td>
                                        <td class="text-bold-500">admin</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Fajar Nugroho</td>
                                        <td>fajar.nugroho@example.com</td>
                                        <td class="text-bold-500">admin</td>
                                    </tr>
                                </tbody>                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Pengguna</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-bold-500">Ahmad Rizky</td>
                                        <td>ahmad.rizky@example.com</td>
                                        <td class="text-bold-500">User</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Dewi Lestari</td>
                                        <td>dewi.lestari@example.com</td>
                                        <td class="text-bold-500">User</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Bagus Saputra</td>
                                        <td>bagus.saputra@example.com</td>
                                        <td class="text-bold-500">User</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Siti Nurhaliza</td>
                                        <td>siti.nurhaliza@example.com</td>
                                        <td class="text-bold-500">User</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Fajar Nugroho</td>
                                        <td>fajar.nugroho@example.com</td>
                                        <td class="text-bold-500">User</td>
                                    </tr>
                                </tbody>  
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
