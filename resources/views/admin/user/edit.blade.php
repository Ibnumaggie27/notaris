@extends('admin.layout.app')

@section('content')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header"><h5>Edit User Admin</h5></div>
            <div class="card-body">
                <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Wajib agar update berjalan -->
                    
                    <div class="form-group mb-3">
                        <label>NIK</label>
                        <input type="text" name="nik" value="{{ $user->nik }}" 
                               class="form-control" required 
                               minlength="16" maxlength="16" pattern="\d{16}" 
                               title="NIK harus terdiri dari 16 angka">
                    </div>

                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" value="{{ $user->nama }}" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Password (kosongkan jika tidak diubah)</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label>Role</label>
                        <select name="role" class="form-control" required>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="superAdmin" {{ $user->role == 'superAdmin' ? 'selected' : '' }}>Super Admin</option>
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Foto (biarkan kosong jika tidak diubah)</label><br>
                        @if ($user->foto)
                            <img src="{{ asset('storage/foto_user/' . $user->foto) }}" alt="Foto" width="100" class="mb-2">
                        @endif
                        <input type="file" name="foto" class="form-control">
                    </div>
                    

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
