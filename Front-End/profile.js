// Data for travels
const travelData = [
  { place: "SEET", status: "success" },
  { place: "SAAT", status: "canceled" },
  { place: "SOES", status: "success" },
  { place: "SENATE", status: "success" },
  { place: "ACCESS BANK", status: "canceled" },
];

// HTML elements
const successfulTravelsElement = document.getElementById("successful-travels");
const canceledTravelsElement = document.getElementById("canceled-travels");
const travelHistoryElement = document.getElementById("travel-history");

// Counters
let successfulTravels = 0;
let canceledTravels = 0;

// Populate history and count travels
travelData.forEach((travel) => {
  // Create history item
  const travelItem = document.createElement("div");
  travelItem.classList.add("travel-item");
  travelItem.innerHTML = `<strong>${travel.place}</strong> - <span class="${travel.status}">${travel.status}</span>`;

  // Append to history section
  travelHistoryElement.appendChild(travelItem);

  // Update counts
  if (travel.status === "success") {
    successfulTravels++;
  } else {
    canceledTravels++;
  }
});

// Display travel counts
successfulTravelsElement.textContent = successfulTravels;
canceledTravelsElement.textContent = canceledTravels;

// Chart setup
const ctx = document.getElementById("travelChart").getContext("2d");
new Chart(ctx, {
  type: "bar",
  data: {
    labels: ["Successful Travels", "Canceled Travels"],
    datasets: [
      {
        label: "Number of Travels",
        data: [successfulTravels, canceledTravels],
        backgroundColor: ["#4CAF50", "#FF5252"],
      },
    ],
  },
  options: {
    scales: {
      y: { beginAtZero: true },
    },
  },
});

//

const menu = document.getElementById("menu");
const close = document.getElementById("close");
const navbar = document.getElementById("navbar");
const insideNav = document.getElementById("insideNav");

function ToggleHidden() {
  navbar.classList.add("active");
}

function hideNavbar() {
  navbar.classList.remove("active");
}

menu.addEventListener("click", (event) => {
  event.stopPropagation();
  ToggleHidden();
});

document.addEventListener("click", (event) => {
  if (!insideNav.classList.contains(event.target)) {
    hideNavbar();
  }
});

// location
const locationList = document.querySelector(".location-list");

function filterLocations() {
  const query = document.getElementById("search-bar").value.toLowerCase();
  const locationList = document.querySelector(".location-list");
  const cards = document.querySelectorAll(".location-card");

  let hasVisibleCards = false;

  cards.forEach((card) => {
    const locationName = card.getAttribute("data-name").toLowerCase();
    if (query && locationName.includes(query)) {
      card.style.display = "block"; // Show card if it matches
      hasVisibleCards = true; // Mark that there's at least one matching card
    } else {
      card.style.display = "none"; // Hide card if it doesn't match
    }
  });

  // Show or hide the location list based on whether there are visible cards
  if (query && hasVisibleCards) {
    locationList.style.display = "grid"; // Show location list if there are matches
  } else {
    locationList.style.display = "none"; // Hide location list if no matches or input is blank
  }
}
function filterLocation() {
  const query = document.getElementById("search-bar").value.toLowerCase();
  const locationList = document.querySelector(".location-list");
  const cards = document.querySelectorAll(".location-card");

  let hasVisibleCards = false;

  cards.forEach((card) => {
    const locationName = card.getAttribute("data-name").toLowerCase();
    if (query && locationName.includes(query)) {
      hasVisibleCards = true; // Mark that there's at least one matching card
    } else {
      card.style.display = "none"; // Hide card if it doesn't match
    }
  });

  // Show or hide the location list based on whether there are visible cards
  if (query && hasVisibleCards) {
    locationList.style.display = "grid"; // Show location list if there are matches
  } else {
    locationList.style.display = "none"; // Hide location list if no matches or input is blank
  }
}

function closeLocationList() {
  const query = (document.getElementById("search-bar").value = "");
  const locationList = document.querySelector(".location-list");

  let hasVisibleCards = false;

  // Show or hide the location list based on whether there are visible cards
  if (query && hasVisibleCards) {
    locationList.style.display = "grid"; // Show location list if there are matches
  } else {
    locationList.style.display = "none"; // Hide location list if no matches or input is blank
  }
}
