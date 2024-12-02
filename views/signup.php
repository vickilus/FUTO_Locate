<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUTO Locate - Signup</title>
    <link rel="stylesheet" href="../public/css/style2.css">
    <script src="../public/js/togglePasswordVisibility.js" defer></script>
</head>
<body>
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar">
            <span class="logo">FUTO Locate</span>
        </nav>

        <!-- Signup Form -->
        
        <div class="signup-container">
            <h2>Signup</h2>
            <form action="../public/signup.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="email">Email:</label>
                <div class="email-container">
                    <input type="email" id="email" name="email" required>
                </div>

                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility()">👁️</span>
                </div>

                <button type="submit">Signup</button>
            </form>
        </div>
    </div>

    <a href="../views/home.php?action=home">Home Page</a>
</body>
</html>
