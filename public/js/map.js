let map;
let markers = [];

$(document).ready(function() {
    // Initialize map on page load
    initMap();

    // Handle form submission
    $("#search-form").on("submit", function(event) {
        event.preventDefault();
        
        let locationName = $("#location-name").val();
        let locationCategory = $("#location-category").val();

        $.ajax({
            url: "../public/search.php",  // Assuming your PHP script is here
            type: "POST",
            data: { name: locationName, category: locationCategory },
            dataType: "json",
            success: function(data) {
                displayResults(data);
                displayLocationsOnMap(data);
            },
            error: function() {
                $("#results-container").html("<p>An error occurred while processing your request.</p>");
            }
        });
    });
});

// Initialize the Google map centered on FUTO
function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 5.3, lng: 7.0 }, // Coordinates for FUTO
        zoom: 15,
    });
}

// Display locations in HTML container
function displayResults(locations) {
    let resultsHtml = "";
    if (locations.length > 0) {
        locations.forEach(location => {
            resultsHtml += `<div class="result-item">
                <h3>${location.name}</h3>
                <p>Category: ${location.category}</p>
                <p>Description: ${location.description}</p>
            </div>`;
        });
    } else {
        resultsHtml = "<p>No results found</p>";
    }
    $("#results-container").html(resultsHtml);
}

// Display locations as markers on the map
function displayLocationsOnMap(locations) {
    clearMarkers();
    locations.forEach(location => {
        const marker = new google.maps.Marker({
            position: { lat: parseFloat(location.latitude), lng: parseFloat(location.longitude) },
            map: map,
            title: location.name,
        });
        markers.push(marker);
    });
}

// Clear all markers from the map
function clearMarkers() {
    markers.forEach(marker => marker.setMap(null));
    markers = [];
}
