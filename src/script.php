<?php
// Connect to the database
$servername = $_SERVER['SERVER_NAME'];
$username = "root@localhost";
$password = "August2003";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if (extension_loaded('mysqli')) {
    echo "MySQLi extension is enabled";
} else {
    echo "MySQLi extension is not enabled";
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection successful!";
}

// Get form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insert data into the database
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    if (mysqli_affected_rows($conn) > 0) {
        echo '<p>Signup Successful! <a href="http://127.0.0.1:5500/html/loggedin.html">Home page</a></p>';
    } else {
        echo "Error: Data not inserted into database";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>