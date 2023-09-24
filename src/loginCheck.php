<?php
$username = $_POST['username'];
$password = $_POST['password'];

$valid = false;

// Read the users.txt file and split each line into an array
$usersFile = 'C:\\xampp\\htdocs\\users.txt'; // Your file path
$userlines = file($usersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($userlines as $line) {
    list($storedUsername, $storedHashedPassword) = explode(':', $line);

    if ($username === $storedUsername) {
        // Use password_verify to check if the entered password matches the stored hash
        if (password_verify($password, $storedHashedPassword)) {
            $valid = true;
            //echo "Login successful";
            //echo "<a href='http://127.0.0.1:5500/html/userhome.html'>Home page</a>";
            } else {
            // Invalid login, display an error message or redirect to a login error page
                echo "Invalid username or password. <a href='http://127.0.0.1:5500/html/login.html'>Try again</a>";
        }
    }

    if ($valid) {
    $username = $_POST['username'];

    // Create or update currentuser.txt
    $currentuserFile = 'currentuser.txt';

    // User information to write (e.g., username)
    $userInfo = "Username: $username\n";

    // Write the user information to currentuser.txt
    file_put_contents($currentuserFile, $userInfo);

    // Redirect to the user's dashboard or any other page
    header('Location: http://localhost/userhome.html');
    exit; // Terminate the script
}
}



    


    
?>