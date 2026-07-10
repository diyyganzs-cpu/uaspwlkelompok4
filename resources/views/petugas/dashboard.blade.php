@extends('layouts.app-petugas')

@section('content')
<div class="container-fluid">
    <Dashboard class="fw-bold mb-1" style="color: #1e1b4b;">Dashboard Petugas</h2>
    <p class="text-muted mb-4">Selamat datang kembali, berikut adalah ringkasan pengaduan hari ini.</p>

    <div class="row g-4">
        @php
            $stats = [
                ['title' => 'Total Pengaduan', 'count' => $total, 'icon' => 'fa-clipboard-list', 'bg' => '#2e1065'],
                ['title' => 'Pending', 'count' => $pending, 'icon' => 'fa-clock', 'bg' => '#4c1d95'],
                ['title' => 'Diproses', 'count' => $diproses, 'icon' => 'fa-spinner', 'bg' => '#5b21b6'],
                ['title' => 'Selesai', 'count' => $selesai, 'icon' => 'fa-check-circle', 'bg' => '#1e1b4b'],
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="col-md-3">
            <div class="card text-white border-0 shadow-sm h-100 p-2 transition-card" style="--card-bg: {{ $stat['bg'] }}; border-radius: 15px;">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 p-3 rounded-circle bg-white bg-opacity-10 text-white">
                        <i class="fas {{ $stat['icon'] }} fa-2x"></i>
                    </div>
                    <div class="ms-3">
                        <h2 class="fw-bold mb-0 text-white">{{ $stat['count'] }}</h2>
                        <p class="mb-0 opacity-75 small">{{ $stat['title'] }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="card mt-5 border-0 shadow-sm" style="border-radius: 15px;">
        <div class="card-body p-4 text-center">
            <h5 class="mb-3 fw-bold" style="color: #2c1556;">Apa yang ingin Anda lakukan hari ini?</h5>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('petugas.index') }}" class="btn btn-lg px-4 text-white d-inline-flex align-items-center gap-2" style="background-color: #2e1065; border-radius: 10px; font-size: 1rem;">
                    <i class="fas fa-tasks"></i> Kelola Pengaduan
                </a>
                <a href="{{ route('petugas.riwayat') }}" class="btn btn-lg px-4 text-white d-inline-flex align-items-center gap-2" style="background-color: #4c1d95; border-radius: 10px; font-size: 1rem;">
                    <i class="fas fa-history"></i> Lihat Riwayat
                </a>
            </div>
        </div>
    </div>
</div>



<style>
    .transition-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .transition-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 20px rgba(76, 29, 149, 0.4) !important;
    }
    .transition-card {
    background-color: var(--card-bg);
}
</style>
@endsection