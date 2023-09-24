<?php
// Load the existing 'groups' data from the JSON file
$jsonFile = 'groups.json';
$groups = json_decode(file_get_contents($jsonFile), true);

// Get form data
$groupName = $_POST['group_name'];
$members = $_POST['members'];
$restaurants = $_POST['restaurants'];
$restaurant1 = $_POST['restaurant1'];
// Extract other restaurant preferences as needed

// Create a new group entry in the 'groups' data structure
$newGroup = [
    'members' => explode(',', $members),
    'restaurants' => explode(',', $restaurants),
    'restaurant_preferences' => [
        // Initialize preferences for each user here
    ],
];

// Update the 'groups' data structure with the new group
$groups[$groupName] = $newGroup;

// Serialize and save the updated 'groups' data to the JSON file
file_put_contents($jsonFile, json_encode($groups));

// Save the updated 'groups' data to groups.txt as well
file_put_contents('groups.txt', json_encode($groups));

// Redirect back to the page or provide feedback
header('Location: http://127.0.0.1:5500/html/groups.html');
exit;
?>
