<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f6f8;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 10px;
        }
        p {
            color: #666;
            margin-bottom: 25px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-logout {
            background: #e74c3c;
            color: #fff;
            margin-right: 10px;
        }
        .btn-cancel {
            background: #bdc3c7;
            color: #2c3e50;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Keluar dari Akun</h2>
    <p>Apakah kamu yakin ingin logout?</p>

    <form action="{{ route('logout') }}" method="POST">
    @csrf

        <button type="submit" class="btn btn-logout">Logout</button>
        <a href="/dashboard">
            <button type="button" class="btn btn-cancel">Batal</button>
        </a>
    </form>
</div>

</body>
</html>
