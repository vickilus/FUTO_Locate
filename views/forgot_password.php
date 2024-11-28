<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="../public/css/webpage.css">
</head>
<body>
  <h2>Forgot Password</h2>
  <form id="forgotPasswordForm" action="../public/forgot_password.php" method="POST">
    <label for="email">Enter your email address:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Send Reset Link</button>
  </form>

  <script>
    // Optional: JavaScript for form validation, success/failure feedback, etc.
    const form = document.getElementById("forgotPasswordForm");
    form.addEventListener("submit", function (e) {
      // Custom client-side validation can be added here
      e.preventDefault();
      const email = form.email.value;

      // Basic validation example
      if (!email.includes("@")) {
        alert("Please enter a valid email address.");
        return;
      }
      
      // Submit the form (can also use AJAX here for an asynchronous request)
      form.submit();
    });
  </script>
</body>
</html>
