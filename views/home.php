<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - FUTO Locate</title>
    <link rel="stylesheet" href="../public/css/styles.css">
    
</head>
<body>
    <h1>Welcome to FUTO Locate!</h1> 
    <br><br>
    
    <p>This is the home page of the application.</p>
    
    <?php if (isset($_SESSION['username'])): ?>
        <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    <?php else: ?>
        <a href="login.php">Login</a> | <a href="admin_login.php">Admin Login</a> | <a href="signup.php">Sign Up</a>
    <?php endif; ?>
    
</body>
</html>
