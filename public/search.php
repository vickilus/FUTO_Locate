<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "futo_locate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search for a location
if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $sql = "SELECT * FROM locations WHERE name LIKE ?";
    $stmt = $conn->prepare($sql);
    $search = "%$query%";
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output the place details
        while ($row = $result->fetch_assoc()) {
            echo "<div class='place-result'>";
            echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            echo "<img src='" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'/>";
            echo "<p>Coordinates: (" . htmlspecialchars($row['latitude']) . ", " . htmlspecialchars($row['longitude']) . ")</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Location not found.</p>";
    }
}

$conn->close();
?>
