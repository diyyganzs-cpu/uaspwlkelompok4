@extends('layouts.app-warga')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold" style="color: #2e1065;">Riwayat Pengaduan</h2>
            <p class="text-muted">Pantau status laporan yang telah Anda kirimkan.</p>
        </div>
        <a href="{{ route('warga.create') }}" class="btn px-4 py-2 shadow-sm" style="background-color: #4c1d95; color: #ffffff; border-radius: 10px;">
            <i class="fas fa-plus me-2"></i> Buat Pengaduan Baru
        </a>
    </div>

    <!-- Table Card -->
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background-color: #1e1b4b; color: #ffffff;">
                        <tr class="text-uppercase" style="font-size: 0.85rem; letter-spacing: 0.5px;">
                            <th class="py-3 ps-4">No</th>
                            <th class="py-3">Judul Pengaduan</th>
                            <th class="py-3">Kategori</th>
                            <th class="py-3">Status</th>
                            <th class="py-3">Tanggapan</th>
                            <th class="py-3 pe-4">Tanggal</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($complaints as $complaint)
                        <tr>
                            <td class="ps-4 fw-bold" style="color: #6366f1;">{{ $loop->iteration }}</td>
                            <td class="fw-bold text-dark">{{ $complaint->judul }}</td>
                            <td>
                                <span class="badge border" style="background-color: #f5f3ff; color: #5b21b6; border-color: #ddd6fe !important;">
                                    {{ $complaint->category->nama }}
                                </span>
                            </td>
                            <td>
                                @if($complaint->status == 'Pending')
                                    <span class="badge rounded-pill px-3" style="background-color: #fef3c7; color: #92400e;">Pending</span>
                                @elseif($complaint->status == 'Diproses')
                                    <span class="badge rounded-pill px-3" style="background-color: #e0e7ff; color: #3730a3;">Diproses</span>
                                @else
                                    <span class="badge rounded-pill px-3" style="background-color: #dcfce7; color: #166534;">Selesai</span>
                                @endif
                            </td>
                            <td class="text-muted small">{{ $complaint->tanggapan ?? 'Menunggu respon...' }}</td>
                            <td class="pe-4 text-secondary">{{ $complaint->created_at->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fas fa-folder-open fa-3x mb-3" style="color: #c7d2fe;"></i>
                                <p>Belum ada data pengaduan yang ditemukan.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Hover effect */
    .table-hover tbody tr:hover {
        background-color: #f5f3ff !important;
        transition: 0.3s;
    }
    
    /* Spacing */
    .table > :not(caption) > * > * {
        padding: 1.5rem 0.75rem;
    }
</style>
@endsection