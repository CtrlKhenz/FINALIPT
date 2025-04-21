<?php
// Start session to store error messages and form data across requests
session_start();

// Initialize variables for the username and password input
$input_username = '';
$input_password = '';

// Check if the form has been submitted via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve the username and password input from the form
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];

    // Include the users.php file which contains an array of users (username and password)
    $users = include("users.php");

    // Iterate through each user in the users array
    foreach ($users as $user) {
        // Check if the input username and password match any user in the users array
        if ($user['username'] === $input_username && $user['password'] === $input_password) {
            
            // Store the username in session to keep the user logged in
            $_SESSION['username'] = $input_username;
            
            // Redirect to the "view.php" page after successful login
            header("Location: view.php");
            exit(); // Stop further script execution after redirect
        }
    }

    // If no matching user is found, store an error message in the session
    $_SESSION['error'] = "❌ Invalid username or password. Please try again.";
    header("Location: login.html"); // Redirect back to the login page
    exit();
}
?>
