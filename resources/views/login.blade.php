<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/stylelogin.css">
</head>
<body>

<div class="login-box">
    <h2>Login</h2>

    <?php
    if (isset($_GET['error'])) {
        echo "<div class='error'>Data login salah</div>";
    }
    ?>

    <form method="POST" action="dashboard.blade.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <!-- Sign In / Sign Up -->
    <div class="signup">
        Belum punya akun?
        <a href="register.php">Sign In</a>
    </div>
</div>

</body>
</html>
