<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps Example</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1vVUcuB93mxdZ9PRqx_doovzrfFgC-tI"></script>
    <style>
        #map {
            height: 100%;
            width: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            height: 100%;
        }
    </style>
</head>
<body>
    <div id="map"></div>
    <script>
        function initMap() {
            // Define map options
            const options = {
                center: { lat: 40.7128, lng: -74.0060 }, // New York City
                zoom: 10,
            };

            // Create the map
            const map = new google.maps.Map(document.getElementById('map'), options);

            // Add a marker
            const marker = new google.maps.Marker({
            position: { lat: 40.730610, lng: -73.935242 }, // Example: New York
            map: map,
            title: 'Custom Marker',
            icon: 'https://maps.google.com/mapfiles/kml/shapes/info-i_maps.png', // Custom icon
        });

                const infoWindow = new google.maps.InfoWindow({
            content: '<h3>New York City</h3><p>The city that never sleeps!</p>',
        });

        marker.addListener('click', () => {
            infoWindow.open(map, marker);
        });


        }

        // Initialize the map
        initMap();
    </script>

<div id="map" style="height: 500px;"></div>
<script>
    function initMap() {
        const map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 40.7128, lng: -74.0060 },
            zoom: 7,
        });

        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map);

        const request = {
            origin: { lat: 40.7128, lng: -74.0060 }, // New York
            destination: { lat: 34.0522, lng: -118.2437 }, // Los Angeles
            travelMode: 'DRIVING',
        };

        directionsService.route(request, (result, status) => {
            if (status === 'OK') {
                directionsRenderer.setDirections(result);
            } else {
                alert('Directions request failed: ' + status);
            }
        });
    }

    initMap();

    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
        (position) => {
            const userLocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            };
            map.setCenter(userLocation);

            // Add a marker for the user's location
            new google.maps.Marker({
                position: userLocation,
                map: map,
                title: 'You are here',
            });
        },
        () => {
            alert('Geolocation failed or denied.');
        }
    );
} else {
    alert('Geolocation is not supported by this browser.');
}

</script>


</body>
</html>
