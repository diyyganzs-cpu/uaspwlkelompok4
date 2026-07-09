<div class="col-md-2 sidebar-container min-vh-100 shadow p-0">
    <div class="p-4 text-center border-bottom border-light border-opacity-10">
        <h5 class="fw-bold text-white mb-0">
            <i class="fas fa-user-circle me-2"></i> SIPM <small class="fw-light opacity-50">Warga</small>
        </h5>
    </div>

    <ul class="nav flex-column mt-3 px-3">
        @php
            $menu = [
                ['name' => 'Dashboard', 'route' => 'warga.dashboard', 'icon' => 'fa-th-large'],
                ['name' => 'Buat Pengaduan', 'route' => 'warga.create', 'icon' => 'fa-edit'],
                ['name' => 'Riwayat', 'route' => 'warga.riwayat', 'icon' => 'fa-list-ul'],
                ['name' => 'Profil', 'route' => 'warga.profil', 'icon' => 'fa-user'],
            ];
        @endphp

        @foreach($menu as $item)
        <li class="nav-item mb-1">
            <a href="{{ route($item['route']) }}" 
               class="nav-link py-3 px-3 rounded-3 sidebar-link {{ request()->routeIs($item['route']) ? 'active-link' : '' }}">
                <i class="fas {{ $item['icon'] }} me-3"></i> {{ $item['name'] }}
            </a>
        </li>
        @endforeach
    </ul>
</div>

<style>
    /* Tema Deepest Midnight Purple */
    .sidebar-container {
        background: linear-gradient(180deg, #1e1b4b 0%, #0f0a21 100%);
    }

    .sidebar-link {
        color: #a5b4fc !important; /* Ungu terang lembut untuk teks non-aktif */
        transition: all 0.3s ease;
        font-weight: 500;
        display: flex;
        align-items: center;
    }

    .sidebar-link:hover {
        background-color: rgba(255, 255, 255, 0.08);
        color: #ffffff !important;
        transform: translateX(5px);
    }

    /* Aksen aktif dengan warna ungu yang lebih dalam dan elegan */
    .active-link {
        background: #4c1d95 !important; 
        color: #ffffff !important;
        box-shadow: 0 4px 15px rgba(76, 29, 149, 0.5);
    }

    .sidebar-link i {
        width: 20px;
        text-align: center;
    }
</style>