@extends('layouts.app-warga')

@section('content')
<!-- Menyisipkan Font Awesome CDN agar ikon di dalam lingkaran langsung muncul -->


<div class="container-fluid py-4">
    
    <!-- Header Dashboard -->
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mb-5 gap-3">
        <div>
            <h2 class="fw-bold mb-1" style="color: #1e1b4b;">Dashboard Warga</h2>
            <p class="text-muted mb-0">Selamat datang, pantau status pengaduan Anda di sini.</p>
        </div>
        <div>
            <a href="{{ route('warga.create') }}" class="btn btn-action text-white px-4 py-2.5 rounded-3 fw-semibold shadow-sm text-nowrap">
                <i class="fas fa-plus-circle me-2"></i>Buat Laporan Baru
            </a>
        </div>
    </div>

    <!-- Grid Kartu Statistik -->
    <div class="row g-4">

        <!-- Kartu 1: Total Pengaduan -->
        <div class="col-sm-6 col-xl-3">
            <div class="card text-white border-0 h-100 summary-card" style="background-color: #2e1065;">
                <div class="card-body p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 text-uppercase fw-semibold metric-label">Total Laporan</p>
                        <h2 class="fw-bold mb-0 display-6">{{ $total }}</h2>
                    </div>
                    <!-- Ikon kini akan muncul karena library sudah dimuat -->
                    <div class="icon-wrapper d-flex align-items-center justify-content-center rounded-circle">
                        <i class="fas fa-folder-open fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kartu 2: Pending -->
        <div class="col-sm-6 col-xl-3">
            <div class="card text-white border-0 h-100 summary-card" style="background-color: #4c1d95;">
                <div class="card-body p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 text-uppercase fw-semibold metric-label">Menunggu</p>
                        <h2 class="fw-bold mb-0 display-6">{{ $pending }}</h2>
                    </div>
                    <div class="icon-wrapper d-flex align-items-center justify-content-center rounded-circle">
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kartu 3: Diproses -->
        <div class="col-sm-6 col-xl-3">
            <div class="card text-white border-0 h-100 summary-card" style="background-color: #5b21b6;">
                <div class="card-body p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 text-uppercase fw-semibold metric-label">Diproses</p>
                        <h2 class="fw-bold mb-0 display-6">{{ $diproses }}</h2>
                    </div>
                    <div class="icon-wrapper d-flex align-items-center justify-content-center rounded-circle">
                        <i class="fas fa-spinner fa-2x fa-spin-hover"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kartu 4: Selesai -->
        <div class="col-sm-6 col-xl-3">
            <div class="card text-white border-0 h-100 summary-card" style="background-color: #1e1b4b;">
                <div class="card-body p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 text-uppercase fw-semibold metric-label">Selesai</p>
                        <h2 class="fw-bold mb-0 display-6">{{ $selesai }}</h2>
                    </div>
                    <div class="icon-wrapper d-flex align-items-center justify-content-center rounded-circle">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    /* Styling dasar kartu */
    .summary-card {
        border-radius: 16px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .summary-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 24px rgba(46, 16, 101, 0.25) !important;
    }
    
    /* Aturan teks label atas */
    .metric-label {
        letter-spacing: 0.8px;
        font-size: 0.75rem;
        opacity: 0.75;
    }

    /* Lingkaran pembungkus ikon agar presisi dan transparan elegan */
    .icon-wrapper {
        width: 56px;
        height: 56px;
        background-color: rgba(255, 255, 255, 0.12);
        transition: transform 0.3s ease;
    }
    .icon-wrapper i {
        color: rgba(255, 255, 255, 0.9);
    }
    .summary-card:hover .icon-wrapper {
        transform: scale(1.1);
        background-color: rgba(255, 255, 255, 0.2);
    }

    /* Tombol Buat Laporan Baru */
    .btn-action {
        background-color: #5b21b6;
        transition: all 0.3s ease;
        border: none;
    }
    .btn-action:hover {
        background-color: #4c1d95;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(91, 33, 182, 0.3);
    }
</style>
@endsection