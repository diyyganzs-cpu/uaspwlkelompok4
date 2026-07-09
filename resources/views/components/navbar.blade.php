<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #2c1556;">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
            <i class="fas fa-bullhorn me-2 text-warning"></i>
            <span>SIPM <span class="fw-light opacity-75 text-small" style="font-size: 0.8rem;">| Layanan Pengaduan</span></span>
        </a>

        <div class="ms-auto d-flex align-items-center">
            <div class="d-none d-md-flex align-items-center me-3 text-white border-end pe-3 border-light border-opacity-25">
                <span class="badge bg-success rounded-circle p-1 me-2 shadow-sm animate-pulse"></span>
                <small class="opacity-75">{{ now()->format('d M Y') }}</small>
            </div>

            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-white d-flex align-items-center gap-2" 
                   href="#" 
                   role="button" 
                   data-bs-toggle="dropdown" 
                   aria-expanded="false">
                    <div class="profile-icon-wrapper bg-white bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                        <span class="fw-bold text-white">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                    </div>
                    <span class="d-none d-md-inline fw-medium">
                        {{ Auth::user()->name }}
                    </span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 py-2 text-center" style="min-width: 200px;">
                    <li class="px-3 py-2 bg-light mx-2 rounded-3 mb-2">
                        <small class="text-muted d-block mb-1">Hak Akses</small>
                        @if(Auth::user()->role == 'petugas')
                            <span class="badge bg-danger text-white px-2 py-1 small shadow-sm">
                                <i class="fas fa-user-shield me-1"></i> Petugas
                            </span>
                        @else
                            <span class="badge bg-primary text-white px-2 py-1 small shadow-sm">
                                <i class="fas fa-user me-1"></i> Warga
                            </span>
                        @endif

                        <div class="small text-muted mt-2" style="font-size: 0.75rem;">
                            {{ Auth::user()->email }}
                        </div>
                    </li>
                    <li><hr class="dropdown-divider opacity-50"></li>
                    <li class="px-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item rounded-2 text-danger d-flex align-items-center justify-content-center gap-2 py-2 fw-bold">
                                <i class="fas fa-sign-out-alt"></i> Keluar Aplikasi
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Animasi kecil agar indikator online terlihat hidup dan interaktif */
    @keyframes pulse {
        0% { transform: scale(0.95); opacity: 0.7; }
        50% { transform: scale(1.1); opacity: 1; }
        100% { transform: scale(0.95); opacity: 0.7; }
    }
    .animate-pulse {
        animation: pulse 2s infinite ease-in-out;
    }
    .dropdown-item:hover {
        background-color: rgba(220, 53, 69, 0.1) !important;
    }
</style>