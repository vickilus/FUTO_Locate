<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUTO Locate - Admin Login</title>
    <link rel="stylesheet" href="../public/css/style2.css">
    <script src="../public/js/togglePasswordVisibility.js" defer></script>
</head>
<body>
  

    <div class="container">
        <!-- Navbar -->
        <nav class="navbar">
            <span class="logo">FUTO Locate Admin Login</span>
        </nav>
        
        <!-- Login Form -->
        <div class="admin-container">
            <h2>Login</h2>
            <form action="../public/admin_login.php?action=login" method="POST">
                <label for="email">email</label>
                <input type="email" name="email" required>

                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility()">👁️</span>
                </div>

               <button type="submit">Admin Login</button>

               <label for="forgot password"></label>
                <div class="forgot password-container">
                <a href="../views/forgot_password.php?action=forgot_password">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>

   <a href="../views/home.php?action=home">Home Page</a>
</body>
</html>