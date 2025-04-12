@extends('admin.layout.app')

@section('content')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header"><h5>Tambah User Admin</h5></div>
            <div class="card-body">
                <form action="{{ route('admin.user.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" required 
                               minlength="16" maxlength="16" pattern="\d{16}" 
                               title="NIK harus terdiri dari 16 angka">
                    </div>                    
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
