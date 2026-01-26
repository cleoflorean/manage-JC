<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .header-logo h2 {
            font-size: 24px;
            color: #334155;
            margin: 0;
            font-weight: 600;
        }

        hr {
            border: 0;
            border-top: 1px solid #eee;
            margin-bottom: 25px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
            position: relative; /* Penting untuk posisi ikon mata */
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #475569;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            border-radius: 25px;
            box-sizing: border-box;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }

        /* Styling Ikon Mata */
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 38px; /* Menyesuaikan posisi di tengah input */
            cursor: pointer;
            color: #64748b;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #17a2b8;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-login:hover {
            background-color: #138496;
        }

        .alert-error {
            background-color: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 13px;
            text-align: center;
        }

        .back-home {
            display: block;
            margin-top: 15px;
            font-size: 14px;
            color: #64748b;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="header-logo">
        <h2>Kasir Login</h2>
    </div>
    
    <hr>

    @if ($errors->has('loginError'))
        <div class="alert-error">
            {{ $errors->first('loginError') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.proses') }}">
        @csrf 
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <i class="fa-solid fa-eye toggle-password" id="eyeIcon"></i>
        </div>

        <button type="submit" class="btn-login">Login</button>
    </form>

    <a href="/" class="back-home">Back to <strong>Home</strong></a>
</div>

<script>
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    eyeIcon.addEventListener('click', function () {
        // Toggle tipe input antara password dan text
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        // Ganti ikon mata (buka/tutup)
        this.classList.toggle('fa-eye-slash');
    });
</script>

</body>
</html>