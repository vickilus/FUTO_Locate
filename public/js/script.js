$(document).ready(function () {
    $("#search-form").on("submit", function (e) {
        e.preventDefault(); // Prevent form from submitting normally
        
        const locationName = $("#location-name").val();
        const category = $("#location-category").val();

        // AJAX call to search for locations
        $.ajax({
            url: '/index.php?action=search',
            type: 'POST',
            data: { name: locationName, category: category },
            success: function (response) {
                displayResults(response); // Function to display results
            },
            error: function () {
                alert("Error occurred while searching for locations.");
            }
        });
    });
});

// Function to display results in the #results-container
function displayResults(data) {
    let resultsContainer = $("#results-container");
    resultsContainer.empty();

    if (data && data.length > 0) {
        data.forEach(function (location) {
            const locationElement = `<div class="location-item">
                <h3>${location.name}</h3>
                <p>${location.description}</p>
                <p><strong>Category:</strong> ${location.category}</p>
            </div>`;
            resultsContainer.append(locationElement);
        });
    } else {
        resultsContainer.append("<p>No results found.</p>");
    }
}
