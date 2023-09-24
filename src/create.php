<?php
// Load the existing 'groups' data from the text file
$filename = "groups.txt";
$groups = [];

if (file_exists($filename)) {
    $groups = json_decode(file_get_contents($filename), true);
}

// Get form data
$groupName = $_POST['group_name'];
$members = $_POST['members'];
$restaurant1 = $_POST['restaurant1'];
// Extract other restaurant preferences as needed

// Create a new group entry in the 'groups' data structure
$newGroup = [
    'members' => explode(',', $members),
    'restaurant_preferences' => [
        'restaurant1' => explode(',', $restaurant1),
        // Add other restaurant preferences as needed
    ],
];

// Update the 'groups' data structure with the new group
$groups[$groupName] = $newGroup;

// Serialize and save the updated 'groups' data to the text file
file_put_contents($filename, json_encode($groups));

// Redirect back to the page or provide feedback
header('Location: groups.html');
exit;
?>