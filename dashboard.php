<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <style>
        body {
            background: linear-gradient(135deg, #11998e, #38ef7d);
            font-family: Arial, sans-serif;
            color: #fff;
            text-align: center;
            padding-top: 100px;
        }
        a {
            color: #fff;
            background: rgba(255, 255, 255, 0.2);
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Welcome, <?= $username ?> </h2>
    <p>You have successfully logged in.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
