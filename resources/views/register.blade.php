<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir User Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px 0;
        }

        .register-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 450px;
            text-align: center;
        }

        .header-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            gap: 10px;
        }

        .header-logo img {
            width: 40px;
            height: auto;
        }

        .header-logo h2 {
            font-size: 22px;
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
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            color: #475569;
            font-weight: 500;
            padding-left: 10px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 20px;
            border: 1px solid #e2e8f0;
            border-radius: 25px;
            box-sizing: border-box;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }

        .form-group input:focus {
            border-color: #17a2b8;
            box-shadow: 0 0 0 3px rgba(23, 162, 184, 0.1);
        }

        .btn-register {
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
            margin-top: 15px;
        }

        .btn-register:hover {
            background-color: #138496;
        }

        .footer-text {
            margin-top: 25px;
            font-size: 14px;
            color: #64748b;
        }

        .footer-text a {
            color: #17a2b8;
            text-decoration: none;
            font-weight: 600;
        }

        .back-home {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 15px;
            font-size: 14px;
            color: #64748b;
            text-decoration: none;
            gap: 5px;
        }
    </style>
</head>
<body>

<div class="register-card">
    <div class="header-logo">
        <h2>Kasir Registration</h2>
    </div>
    
    <hr>

    <form action="{{ route('register') }}" method="POST">
        @csrf <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" placeholder="Enter your full name" required>
        </div>

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Choose a username" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Create password" required>
        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="Repeat password" required>
        </div>

        <button type="submit" class="btn-register">Register Account</button>
    </form>

    <div class="footer-text">
        Already have an Account? <a href="{{ route('login') }}">Login</a>
    </div>

    <a href="/" class="back-home">
        Back to 🏠 <strong>Home</strong>
    </a>
</div>

</body>
</html>