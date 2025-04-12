@extends('admin.layout.app')

@section('content')
<div class="page-content"> 
    <section class="section">
        <div class="card-content">
            <div class="card-body text-center">
                {{-- Gambar profil --}}
                @if ($user->foto)
                    <img class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;" src="{{ asset('storage/' . $user->foto) }}" alt="Foto Profil">
                @else
                    <img class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;" src="{{ asset('assets/compiled/jpg/banana.jpg') }}" alt="Foto Default">
                @endif

                <h4 class="card-title">{{ $user->nama }}</h4>
                <p class="card-text">
                    <strong>NIK:</strong> {{ $user->nik }}<br>
                    <strong>Email:</strong> {{ $user->email }}
                </p>
            </div>
        </div>
    </section>
</div>

@endsection