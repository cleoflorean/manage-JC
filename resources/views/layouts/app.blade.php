<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
    <title>@yield('title')</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Global Style */
        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            background-color: #f8fafc;
            margin: 0;
        }

        #db-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            background: #f8fafc;
        }

        /* Sinkronisasi Header/Topbar agar serasi */
        .navbar {
            background-color: #ffffff !important; /* Mengubah toska menjadi putih bersih */
            border-bottom: 1px solid #e2e8f0 !important; /* Garis pemisah tipis */
            padding: 0.75rem 1.5rem !important;
            box-shadow: none !important;
        }

        /* Mengubah warna teks brand/admin di navbar agar tidak hilang saat bg jadi putih */
        .navbar .navbar-brand, 
        .navbar .nav-link,
        .navbar .dropdown-toggle {
            color: #1e293b !important; 
            font-weight: 600;
        }

        /* Style agar ikon memiliki ukuran yang konsisten */
        i {
            vertical-align: middle;
        }

        #page-content {
            padding: 2rem;
        }
    </style>
</head>
<body>
<div id="db-wrapper">

    @include('layouts.sidebar')

    <div class="main-wrapper">
        @include('layouts.topbar')
        
        <main id="page-content">
            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>