<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Search</title>
    <link rel="stylesheet" href="../public/css/search.css">
    <style>
        /* Add some basic styling */
        body { font-family: Arial, sans-serif; }
        .search-form { margin-bottom: 20px; }
        .location-list { list-style: none; padding: 0; }
        .location-item { margin: 5px 0; }
    </style>
</head>
<body>

<h1>Search Locations</h1>

<div class="search-form">
    <input type="text" id="searchInput" placeholder="Enter location name">
    <button onclick="searchLocations()">Search</button>
</div>

<ul class="location-list" id="locationList"></ul>

<script>
function searchLocations() {
    const query = document.getElementById('searchInput').value;
    fetch(`../public/search.php?q=${query}`)
        .then(response => response.json())
        .then(data => {
            const locationList = document.getElementById('locationList');
            locationList.innerHTML = '';

            data.forEach(location => {
                const listItem = document.createElement('li');
                listItem.className = 'location-item';
                
                const locationInfo = `${location.name} - ${location.address}`;
                const mapLink = `https://www.google.com/maps/dir/?api=1&destination=${location.latitude},${location.longitude}`;

                listItem.innerHTML = `
                    ${locationInfo} 
                    <a href="${mapLink}" target="_blank">Get Directions</a>
                `;

                locationList.appendChild(listItem);
            });
        })
        .catch(error => console.error('Error:', error));
}
</script>

<a href="../views/user_dashboard.php?action=dashboard">User dashboard</a>
</body>
</html>
