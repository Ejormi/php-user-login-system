<?php
include('db_connect.php');
session_start();

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            $message = "<div class='error'>❌ Incorrect password!</div>";
        }
    } else {
        $message = "<div class='error'>❌ User not found!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    * {margin: 0; padding: 0; box-sizing: border-box;}
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #1CB5E0, #000851);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        background: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        width: 350px;
        text-align: center;
    }
    h2 {
        color: #1CB5E0;
        margin-bottom: 20px;
    }
    input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }
    button {
        width: 100%;
        padding: 12px;
        background: #1CB5E0;
        color: #fff;
        font-weight: 600;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s;
    }
    button:hover {
        background: #0078a4;
    }
    .error {
        color: #d63031;
        font-size: 14px;
        margin-top: 15px;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Welcome Back</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <?= $message ?>
</div>
</body>
</html>
