<!DOCTYPE html>
<html>
<head>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1vVUcuB93mxdZ9PRqx_doovzrfFgC-tI"></script>
    <script>
        function initMap(latitude, longitude) {
            var place = {lat: latitude, lng: longitude};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: place
            });
            var marker = new google.maps.Marker({
                position: place,
                map: map
            });
        }
    </script>
</head>
<body>
    <div id="map" style="width:100%;height:400px;"></div>
    <script>
        // Assuming we get latitude and longitude from PHP in JSON format
        const latitude = <?php echo json_encode($row['latitude']); ?>;
        const longitude = <?php echo json_encode($row['longitude']); ?>;
        initMap(latitude, longitude);
    </script>

<a href="../views/search.php?action=search">Search Locations</a>
</body>
</html>
