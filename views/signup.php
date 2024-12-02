<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup - FUTO Locate</title>
</head>
<body>
    <h2>Signup</h2>
    <form action="../public/signup.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>