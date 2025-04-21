<?php
// Include the user data from the 'users.php' file
$users = include("users.php");

// Optional: Set an admin password to protect the page
$admin_password = "admin123"; // You can change this password

// Start a session to track if the user is logged in as an admin
session_start();

// Check if the user is not logged in as admin
if (!isset($_SESSION['is_admin'])) {
    // If the user submits the password form (POST request), verify the password
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["password"])) {
        // If the entered password matches the admin password, set session variable
        if ($_POST["password"] === $admin_password) {
            $_SESSION['is_admin'] = true;
        } else {
            // If the password is incorrect, set an error message
            $error = "Incorrect password!";
        }
    } else {
        // Display the password input form if the user is not logged in
        echo '
        <form method="post" style="margin:100px auto;width:300px;text-align:center;font-family:sans-serif;">
            <h2>🔐 Admin Login</h2>
            ' . (isset($error) ? "<p style='color:red;'>$error</p>" : "") . '
            <input type="password" name="password" placeholder="Enter admin password" style="padding:10px;width:100%;margin-bottom:10px;"><br>
            <button type="submit" style="padding:10px 20px;">Login</button>
        </form>';
        exit(); // Stop further script execution if not logged in
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - All Registered Users</title>
  <style>
    /* Basic styles for the page */
    body {
      font-family: Arial, sans-serif;
      background-color: #eef2f3; /* Light background color */
      padding: 20px;
    }

    /* Title styles */
    h2 {
      text-align: center;
      color: #333;
    }

    /* Table styles */
    table {
      width: 90%;
      margin: 20px auto;
      border-collapse: collapse;
      background-color: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Light shadow for the table */
    }

    th, td {
      padding: 12px;
      border: 1px solid #ccc;
      text-align: left;
    }

    th {
      background-color: #2c3e50; /* Dark background for the header */
      color: white;
    }

    /* Alternating row colors */
    tr:nth-child(even) {
      background-color: #f9f9f9; /* Light color for even rows */
    }

    /* Back link style */
    .back {
      text-align: center;
      margin-top: 20px;
    }
    .back a {
      text-decoration: none;
      color: #007BFF; /* Blue color for the links */
    }
  </style>
</head>
<body>
  <!-- Title for the admin section -->
  <h2>👥 All Registered Users</h2>

  <!-- Table to display all registered users -->
  <table>
    <thead>
      <tr>
        <th>Full Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Password</th>
      </tr>
    </thead>
    <tbody>
      <!-- Loop through the $users array and display each user's information -->
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?= htmlspecialchars($user['fullname']) ?></td>
          <td><?= htmlspecialchars($user['username']) ?></td>
          <td><?= htmlspecialchars($user['email']) ?></td>
          <td><?= htmlspecialchars($user['phone']) ?></td>
          <td><?= htmlspecialchars($user['password']) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- Navigation links to go back to the user view or log out -->
  <div class="back">
    <a href="index.html">← Back to User View</a> | <a href="logout.php">Logout</a>
  </div>
</body>
</html>
