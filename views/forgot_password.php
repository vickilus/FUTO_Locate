<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="/public/assets/css/styles.css">
</head>
<body>
    <h2>Forgot Password</h2>
    <form action="/public/index.php?action=request_reset" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Send Reset Link</button>
    </form>
</body>
</html>
