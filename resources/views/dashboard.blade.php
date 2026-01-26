<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        .sidebar {
            width: 220px;
            height: 100vh;
            background: #343a40;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 60px;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #ddd;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
            color: white;
        }
        .content {
            margin-left: 220px;
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

<div class="navbar">
    <div>Dashboard Kasir</div>
    <div class="user-info">
        <span>{{ Auth::user()->username ?? 'Guest' }}</span>
        
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</div>

<div class="sidebar">
    <a href="{{ route('dashboard') }}">🏠 Home</a>
    <a href="{{ route('barang.index') }}">📦 Data Barang</a>
    <a href="#">📊 Statistik</a>
    <a href="#">⚙️ Pengaturan</a>
</div>

<div class="content">
    <h2>Selamat Datang, {{ Auth::user()->username }}! 👋</h2>

    <div class="cards">
        <div class="card">
            <h3>Total User</h3>
            <p>120</p>
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

</body>
</html>