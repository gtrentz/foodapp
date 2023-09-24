<?php
// Assuming you have a function to read and write user preferences to a file or database

// Step 1: Receive user preferences from the HTML form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $restaurantPreferences = $_POST["restaurantPreferences"]; // An array of user preferences

    // Step 2: Process and update user preferences
    // Update the user's preferences in your data store
    updateUserPreferences($username, $restaurantPreferences); // Implement this function

    // Step 3: Get the user's liked restaurants
    $likedRestaurants = getUserPreferences(); // Implement this function

    // Step 4: Display the list of liked restaurants to the user
    if (!empty($likedRestaurants)) {
        echo "<h3>Liked Restaurants:</h3>";
        echo "<ul>";
        foreach ($likedRestaurants as $restaurant) {
            echo "<li>" . $restaurant->name . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No liked restaurants found for the user.</p>";
    }
}

function getUserPreferences() {
    $preferencesFile = 'users.txt';
    $userPreferences = [];

    if (file_exists($preferencesFile)) {
        // Read the preferences file line by line
        $lines = file($preferencesFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            // Split each line into parts using the colon (:) separator
            list($username, $restaurant, $preference) = explode(':', $line);

            // Add the preference to the user's preferences array
            if (!isset($userPreferences[$username])) {
                $userPreferences[$username] = [];
            }

            // Store the user's preference for the restaurant
            $userPreferences[$username][$restaurant] = $preference;
        }
    }

    return $userPreferences;
}


// Assuming you have a function to retrieve restaurant details based on an ID or name
// Modify this function to suit your data storage method (e.g., database query)

function getRestaurantById($restaurantId) {
    // Replace this with your actual database query or data retrieval logic
    $restaurants = [
        'restaurant1' => [
            'name' => 'Restaurant 1',
            'description' => 'Description of Restaurant 1',
            'imageSrc' => 'restaurant1.jpg',
        ],
        'restaurant2' => [
            'name' => 'Restaurant 2',
            'description' => 'Description of Restaurant 2',
            'imageSrc' => 'restaurant2.jpg',
        ],
        // Add more restaurants as needed
    ];

    if (isset($restaurants[$restaurantId])) {
        return $restaurants[$restaurantId];
    } else {
        return null; // Return null if the restaurant ID does not exist
    }
}

function getLikedRestaurants($username) {
    $userPreferences = getUserPreferences(); // Implement this function to retrieve user preferences

    if (isset($userPreferences[$username])) {
        $likedRestaurants = [];
        foreach ($userPreferences[$username] as $restaurantName => $preference) {
            if ($preference === 'like') {
                // Assuming $restaurantName is a unique identifier for restaurants
                $restaurant = getRestaurantById($restaurantName); // Implement this function to get restaurant details
                if ($restaurant) {
                    $likedRestaurants[] = $restaurant;
                }
            }
        }
        return $likedRestaurants;
    } else {
        return []; // Return an empty array if the user does not exist or has no liked restaurants
    }
}

?>
