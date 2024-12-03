<?php
// index.php

// Set the default timezone
date_default_timezone_set("UTC");

// A simple function to greet the user
function greetUser() {
    $hour = date("H");
    if ($hour < 12) {
        return "Good Morning!";
    } elseif ($hour < 18) {
        return "Good Afternoon!";
    } else {
        return "Good Evening!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
        }
        footer {
            margin-top: 20px;
            color: #999;
        }
    </style>
</head>
<body>
    <h1><?php echo greetUser(); ?></h1>
    <p>Welcome to my PHP-powered website!</p>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Website. All rights reserved.</p>
    </footer>
</body>
</html>
