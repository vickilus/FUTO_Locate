<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    <link rel="stylesheet" href="../public/css/styles.css"> 
</head>

<body>
    <h2>Login</h2>
    <form action="../public/login.php?action=login" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <br><br>
    
    <a href="../views/forgot_password.php?action=forgot_password">Forgot Password?</a>
</body>
</html>