<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - FUTO Locate</title>
</head>
<body>
    <h1>Welcome to FUTO Locate!</h1>
    <p>This is the home page of the application.</p>
    
    <?php if (isset($_SESSION['username'])): ?>
        <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    <?php else: ?>
        <a href="login.php">Login</a> | <a href="signup.php">Sign Up</a>
    <?php endif; ?>
</body>
</html>
