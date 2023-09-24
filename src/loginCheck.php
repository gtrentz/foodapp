<?php
$username = $_POST['username'];
$password = $_POST['password'];

// Read the users.txt file and split each line into an array
$userlines = file("users.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Loop through the lines to find a match
$validLogin = false;

foreach ($userlines as $line) {
    list($storedUsername, $storedPassword) = explode(':', $line); // Use ':' as delimiter
    if ($username === $storedUsername && $password === $storedPassword) { // Check for a match
        $validLogin = true;
        break; // Match found, exit the loop
    }
}

if ($validLogin) {
    // Successful login, redirect to a welcome page or perform necessary actions
    echo "Login successful";
    echo "<a href='http://127.0.0.1:5500/html/userhome.html'>Home page</a>";
    //exit();
} else {
    // Invalid login, display an error message or redirect to a login error page
    echo "Invalid username or password. <a href='http://127.0.0.1:5500/html/login.html'>Try again</a>";
}
?>