<?php
// Connect to the database
$servername = $_SERVER['SERVER_NAME'];
$username = "gtrentz";
$password = "Augu$t2003!";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insert data into the database
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
// ...
?>