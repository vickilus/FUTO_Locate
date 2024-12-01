<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Travel Dashboard</title>
    <link rel="stylesheet" href="../public/css/profile.css">
</head>

<body>


    <div class="absolute1">

        <div class="flex_contain">
            <a href="../views/user_dashboard.php" class="icon"><i class="fa-solid fa-earth-americas"></i></a>
            <header>
                <i class="fa-solid fa-location-crosshairs"></i>
                <input type="text" id="search-bar" placeholder="Search for a location..." onkeyup="filterLocation()">
                <span class="search_button icon" onclick="filterLocations()"><i
                        class="fa-solid fa-magnifying-glass"></i></span>
            </header>
            <span class="profile_image">
                <img src="../public/images/img/logo.png" alt="what">
            </span>
        </div>

        <div class="location-list">
            <div class="location_contain">

                <a href="#" class="location-card" onclick="closeLocationList()" data-name="Beach Paradise">
                    <h2>Beach Paradise</h2>
                    <p>A beautiful beach with golden sands and clear waters.</p>
                </a>
                <a href="#" class="location-card" onclick="closeLocationList()" data-name="Mountain Peak">
                    <h2>Mountain Peak</h2>
                    <p>Experience the serene beauty of the mountains.</p>
                </a>
                <a href="#" class="location-card" onclick="closeLocationList()" data-name="Urban Cityscape">
                    <h2>Urban Cityscape</h2>
                    <p>Discover the vibrant life of the city.</p>
                </a>
            </div>
            <!-- Add more location cards as needed -->
        </div>
    </div>
    <div class="dashboard">
        <h1>Map Dashboard</h1>

        <!-- Statistics Section -->
        <div class="stats">
            <div class="stat-card">
                <h3>Successful Travels</h3>
                <p id="successful-travels">0</p>
            </div>
            <div class="stat-card">
                <h3>Canceled Travels</h3>
                <p id="canceled-travels">0</p>
            </div>
        </div>

        <!-- History Section -->
        <div class="history">
            <h2>Travel History</h2>
            <div id="travel-history">
                <table id="customers">
                    <tr>
                        <th>Present Location</th>
                        <th>Destination Location</th>
                        <th>Time Spent</th>
                    </tr>
                    <tr>
                        <td>SEET</td>
                        <td>SAAT</td>
                        <td>20min</td>
                    </tr>
                    <tr>
                        <td>SEET</td>
                        <td>SAAT</td>
                        <td>20min</td>
                    </tr>
                    <tr>
                        <td>SAAT</td>
                        <td>SOES</td>
                        <td>20min</td>
                    </tr>
                    <tr>
                        <td>SKIT</td>
                        <td>SENATE</td>
                        <td>20min</td>
                    </tr>
                    <tr>
                        <td>ACCESS BANK</td>
                        <td>SENATE</td>
                        <td>20min</td>
                    </tr>
                    <tr>
                        <td>SOES</td>
                        <td>SAAT</td>
                        <td>20min</td>
                    </tr>


                </table>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="chart">
            <h2>Travel Status Overview</h2>
            <canvas id="travelChart"></canvas>
        </div>
    </div>



    <script src="../public/js/profile.js"></script>
</body>

<a href="../views/user_dashboard.php?action=user_dashboard">User dashboard</a>
</html>