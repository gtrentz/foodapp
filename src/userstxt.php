<?php
// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Open the file for writing
$file = fopen("http://localhost/users.txt", "a");
// Write the username and hashed password to the file
fwrite($file, "$username:$hashed_password\n");

// Close the file
fclose($file);

// Output a success message
echo "Signup successful!";
?>