@extends('layouts.app-warga')

@section('content')
<div class="container-fluid py-2">
    <h2 class="mb-4 fw-bold" style="color: #2c1556;">Profil Warga</h2>

    <div class="row">
        <!-- Kolom Kiri: Ringkasan Profil & Aksi -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-4 text-center d-flex flex-column align-items-center justify-content-center">
                    
                    <!-- Avatar Placeholder -->
                    <div class="avatar-wrapper mb-3 d-flex align-items-center justify-content-center rounded-circle" 
                         style="width: 130px; height: 130px; background-color: rgba(44, 21, 86, 0.1); color: #2c1556;">
                        <i class="fas fa-user-circle fa-5x"></i>
                    </div>

                    <!-- Info Singkat -->
                    <h4 class="fw-bold mb-1" style="color: #2c1556;">{{ $user->name }}</h4>
                    <p class="text-muted mb-3">{{ $user->email }}</p>
                    
                    <span class="badge px-4 py-2 mb-4 fs-6 shadow-sm" style="background-color: #2c1556;">
                        <i class="fas fa-user-shield me-2"></i>{{ ucfirst($user->role) }}
                    </span>

                    <!-- Tombol Edit Profil dipindah ke bawah profil agar UI lebih natural -->
                    <a href="{{ route('warga.edit.profil') }}" class="btn btn-purple-dark w-100 py-2 rounded-3 fw-bold">
                        <i class="fas fa-user-edit me-2"></i> Edit Profil
                    </a>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Detail Data Pengguna -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header text-white py-3" style="background-color: #2c1556;">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-address-card me-2"></i> Data Lengkap Pengguna</h5>
                </div>
                <div class="card-body p-4 p-md-5">
                    
                    <!-- Struktur baris tanpa tabel kaku -->
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-4 text-muted fw-medium">Nomor Induk Kependudukan</div>
                        <div class="col-sm-8 fw-bold fs-6" style="color: #2c1556;">{{ $user->nik }}</div>
                    </div>
                    <hr class="opacity-10 mb-4">

                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-4 text-muted fw-medium">Nama Lengkap</div>
                        <div class="col-sm-8 fw-bold fs-6" style="color: #2c1556;">{{ $user->name }}</div>
                    </div>
                    <hr class="opacity-10 mb-4">

                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-4 text-muted fw-medium">Alamat Email</div>
                        <div class="col-sm-8 fw-bold fs-6" style="color: #2c1556;">{{ $user->email }}</div>
                    </div>
                    <hr class="opacity-10 mb-4">

                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-4 text-muted fw-medium">Nomor Handphone</div>
                        <div class="col-sm-8 fw-bold fs-6" style="color: #2c1556;">{{ $user->no_hp }}</div>
                    </div>
                    <hr class="opacity-10 mb-4">

                    <div class="row align-items-start">
                        <div class="col-sm-4 text-muted fw-medium pt-1">Alamat Domisili</div>
                        <div class="col-sm-8 fw-bold fs-6" style="color: #2c1556; line-height: 1.6;">
                            {{ $user->alamat }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Style Kustom yang dipertahankan */
    .btn-purple-dark {
        background-color: #2c1556 !important;
        color: #fff !important;
        transition: all 0.3s ease;
        border: none;
    }
    .btn-purple-dark:hover {
        background-color: #1d0e3a !important;
        box-shadow: 0 4px 15px rgba(44, 21, 86, 0.3);
        transform: translateY(-2px);
    }
    .avatar-wrapper i {
        opacity: 0.8;
    }
</style>
@endsection