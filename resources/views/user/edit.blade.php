@extends('user.layout.app')

@section('content')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Edit Profil Pengguna</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" value="{{ $user->nik }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $user->nama }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>Role</label>
                        <select name="role" class="form-control">
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Foto (opsional)</label><br>
                        @if($user->foto)
                            <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto" width="100"><br>
                        @endif
                        <input type="file" name="foto" class="form-control mt-2">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
