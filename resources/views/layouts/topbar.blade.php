<nav class="navbar navbar-expand navbar-dark border-bottom fixed-top" style="height: 70px; background-color: #0f172a; border-color: rgba(255,255,255,0.1) !important; z-index: 1030;">
    <div class="container-fluid px-4">
        
        <a class="navbar-brand d-flex align-items-center fw-bold" href="#">
            <i class="fa-solid fa-box-open text-primary me-2"></i> 
            Inventory
        </a>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center text-white fw-semibold" 
                       href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(optional(Auth::user())->username ?? 'Admin') }}&background=3b82f6&color=fff" 
                             alt="User" class="rounded-circle me-2" width="32">
                        Admin {{ optional(Auth::user())->username ?? 'Admin' }}
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 animate slideIn" style="border-radius: 12px; min-width: 160px;">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger py-2 fw-bold" onclick="return confirm('Yakin ingin keluar?')">
                                    <i class="fa-solid fa-power-off me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Spacer untuk menghindari konten tertimpa navbar -->
<div style="height: 70px;"></div>

<style>
    /* Pastikan body memiliki padding-top untuk navbar fixed */
    body {
        padding-top: 0 !important;
    }

    .navbar {
        background-color: #0f172a !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    /* Animasi dropdown */
    .dropdown-menu {
        display: block;
        visibility: hidden;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
    }
    
    .dropdown-menu.show {
        visibility: visible;
        opacity: 1;
        transform: translateY(0);
    }

    /* Memastikan teks link di topbar berwarna putih */
    .navbar-dark .navbar-nav .nav-link {
        color: rgba(255, 255, 255, 0.9) !important;
    }

    .navbar-dark .navbar-nav .nav-link:hover {
        color: #ffffff !important;
    }

    /* Memberikan efek hover pada item logout */
    .dropdown-item:hover {
        background-color: #fff1f2;
    }

    /* Pastikan konten utama tidak tertimpa */
    .main-content,
    main,
    .content-wrapper {
        margin-top: 0 !important;
        padding-top: 0 !important;
    }
</style>