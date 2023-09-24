<?php
$username = $_POST['username'];
$password = $_POST['password'];

// Read the users.txt file and split each line into an array
$usersFile = 'C:\\xampp\\htdocs\\users.txt'; // Your file path
$userlines = file($usersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($userlines as $line) {
    list($storedUsername, $storedHashedPassword) = explode(':', $line);

    if ($username === $storedUsername) {
        // Use password_verify to check if the entered password matches the stored hash
        if (password_verify($password, $storedHashedPassword)) {
            // Successful login, redirect to a welcome page or perform necessary actions
            echo "Login successful";
            echo "<a href='http://127.0.0.1:5500/html/userhome.html'>Home page</a>";
            //exit();
        } else {
            // Invalid login, display an error message or redirect to a login error page
            echo "Invalid username or password. <a href='http://127.0.0.1:5500/html/login.html'>Try again</a>";
        }
    }
}



    


    
?>