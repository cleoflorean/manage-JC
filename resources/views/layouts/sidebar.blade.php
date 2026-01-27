<nav class="navbar-vertical navbar navbar-expand-lg">
    <div class="nav-scroller">
        <div class="sidebar-brand px-4 py-4">
            <a class="text-white fw-bold text-decoration-none fs-3" href="{{ url('dashboard') }}">
                <span class="text-primary">JC</span> <small class="fs-6 fw-light">Manage</small>
            </a>
        </div>

        <ul class="navbar-nav flex-column" id="sideNavbar">
            
            <li class="nav-item-label px-4 pb-2 text-uppercase fw-bold text-white" style="font-size: 11px;">Main Menu</li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                    <i class="fa-solid fa-house me-2"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('barang*') || request()->is('produk*') ? 'active' : '' }}" 
                   data-bs-toggle="collapse" href="#componentsMenu" role="button">
                    <i class="fa-solid fa-box-archive me-2"></i>
                    Manajemen Barang
                    <span class="ms-auto">
                        <i class="fa-solid fa-chevron-down fs-xs"></i>
                    </span>
                </a>

                <div class="collapse {{ request()->is('barang*') || request()->is('produk*') ? 'show' : '' }}" id="componentsMenu">
                    <ul class="nav flex-column ms-3 mt-1">
                        <li class="nav-item">
                            <a class="nav-link sub-link" href="/barang">
                                <i class="fa-solid fa-circle-dot me-2" style="font-size: 8px;"></i> Barang Masuk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sub-link" href="/produk">
                                <i class="fa-solid fa-circle-dot me-2" style="font-size: 8px;"></i> Barang Keluar
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('laporan*') ? 'active' : '' }}" href="{{ url('/laporan') }}">
                    <i class="fa-solid fa-chart-simple me-2"></i>
                    Laporan
                </a>
            </li> 

            <li class="nav-item my-4">
                <hr class="mx-4 border-secondary opacity-25">
            </li>

            <li class="nav-item px-4 mb-5">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" onclick="return confirm('Yakin ingin logout?')" class="logout-btn-custom">
                        <i class="fa-solid fa-right-from-bracket me-2"></i>
                        Logout Sistem
                    </button>
                </form>
            </li>

        </ul>
    </div>
</nav>

<style>
.navbar-vertical {
    width: 270px;
    min-height: 100vh;
    position: fixed;
    background-color: #0f172a !important;
    overflow-y: auto;
    border-right: 1px solid rgba(255,255,255,0.05);
    transition: all 0.3s ease;
}

.navbar-vertical .nav-link {
    color: #94a3b8 !important;
    padding: 12px 24px;
    display: flex;
    align-items: center;
    font-size: 15px;
    font-weight: 500;
    transition: all 0.2s ease;
}

.navbar-vertical .nav-link i {
    width: 20px;
    font-size: 18px;
}

.navbar-vertical .nav-link:hover {
    color: #ffffff !important;
    background: rgba(255,255,255,0.05);
}

.navbar-vertical .nav-link.active {
    color: #ffffff !important;
    background: #3b82f6; 
    border-radius: 8px;
    margin: 0 15px;
}

.sub-link {
    padding: 8px 24px !important;
    font-size: 14px !important;
    opacity: 0.8;
}

.sub-link:hover {
    opacity: 1;
}

.logout-btn-custom {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    background: rgba(239, 68, 68, 0.1);
    border: 1px solid rgba(239, 68, 68, 0.2);
    color: #f87171;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
}

.logout-btn-custom:hover {
    background: #ef4444;
    color: white;
}

#page-content {
    margin-left: 270px;
    transition: margin 0.3s ease;
}

.fs-xs { font-size: 12px; }

body.sidebar-collapsed .navbar-vertical {
    margin-left: -270px;
}
body.sidebar-collapsed #page-content {
    margin-left: 0;
}
</style>