<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "Access denied. Please login.";
    exit();
}

$users = include("users.php");
$currentUser = null;

foreach ($users as $user) {
    if ($user['username'] === $_SESSION['username']) {
        $currentUser = $user;
        break;
    }
}

if (!$currentUser) {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Roboto', sans-serif;
            background: #1c1c1c; /* Dark background */
            color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        /* Profile card container */
        .profile-card {
            background: #2b2b2b; /* Dark card background */
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
            max-width: 500px;
            width: 100%;
            text-align: center;
            background-image: url('https://via.placeholder.com/800'); /* Add a cool gaming background image */
            background-size: cover;
            background-position: center;
        }

        /* Title */
        .profile-card h2 {
            margin-bottom: 20px;
            color: #fff;
            font-size: 24px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
        }

        /* Paragraph styling */
        .profile-card p {
            font-size: 18px;
            margin: 10px 0;
            color: #dcdcdc;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
        }

        /* Button styling */
        .logout-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: #ff5c5c; /* Red gaming accent */
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        /* Hover effect for logout button */
        .logout-btn:hover {
            background: #e02d2d; /* Darker red */
        }

        /* Small shadow effect */
        .logout-btn:focus {
            outline: none;
            box-shadow: 0 0 8px rgba(255, 92, 92, 0.6);
        }
    </style>
</head>
<body>

    <div class="profile-card">
        <h2>Hello, <?php echo htmlspecialchars($currentUser['fullname']); ?>!</h2>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($currentUser['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($currentUser['email']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($currentUser['phone']); ?></p>
        <a class="logout-btn" href="logout.php">Logout</a>
    </div>

</body>
</html>
