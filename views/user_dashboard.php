<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUTO Locate Application</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <h1>Welcome to FUTO Locate Application</h1>

    <!-- Search Form -->
    <div id="search-container">
        <form id="search-form">
            <label for="location-name">Location Name:</label>
            <input type="text" id="location-name" name="name">
            
            <label for="location-category">Category:</label>
            <select id="location-category" name="category">
                <option value="">All Categories</option>
                <option value="Building">Building</option>
                <option value="Office">Office</option>
                <!-- Add more categories as needed -->
            </select>
            
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Search Results -->
    <div id="results-container"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../public/js/scripts.js"></script>

    <p><a href="../public/home.php?action=Logout">Logout</a></p>

</body>
</html>
