<?php

// Include the SessionHelper.php
require_once 'SessionHelper.php';

// Setting a session variable for user location
SessionHelper::set('user_location', 'FUTO Main Gate');

// Getting the stored location
$userLocation = SessionHelper::get('user_location', 'Unknown Location');

// Check if a session variable exists
if (SessionHelper::exists('user_location')) {
    echo "User location is set to: $userLocation";
} else {
    echo "Location not set.";
}

// Removing the session variable
SessionHelper::remove('user_location');

// Destroying the session when user logs out
SessionHelper::destroy();
?>