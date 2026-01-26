@extends('layouts.app')

@section('title', 'Dashboard | Konveksi Cloteh')

@section('content')
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            margin: 0;
            background: #f4f6f9;
        }
        .navbar {
            background: #138496;
            padding: 15px 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content {
            margin-left: 20px;
            padding: 20px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,.1);
            margin-bottom: 20px;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        .card h3 {
            margin: 0;
            color: #333;
        }
        /* Style untuk tombol logout agar tidak terlihat seperti form biasa */
        .logout-btn {
            background: none;
            border: none;
            color: white;
            font-weight: bold;
            cursor: pointer;
            padding: 0;
            font-size: 16px;
            margin-left: 10px;
        }
        .logout-btn:hover {
            text-decoration: underline;
        }
        .user-info {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>

<div class="content">
    <h2>Selamat Datang, {{ Auth::user()->username }}! 👋</h2>

    <div class="cards">
        <div class="card">
            <h3>Total Stok</h3>
            <p>{{ $totalStok }}</p>
        </div>
        <div class="card">
            <h3>Pengunjung</h3>
            <p>560</p>
        </div>
        <div class="card">
            <h3>Data Aktif</h3>
            <p>85</p>
        </div>
    </div>

    <div class="card" style="margin-top: 20px;">
        <h3>Informasi</h3>
        <p>Ini adalah halaman dashboard utama aplikasi kasir kamu. 
        Anda masuk sebagai <strong>{{ Auth::user()->email }}</strong>.</p>
    </div>
</div>

@endsection