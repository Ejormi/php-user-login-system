<?php
include('db_connect.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        $message = "<div class='success'>✅ Successfully registered! <a href='login.php'>Login here</a></div>";
    } else {
        $message = "<div class='error'>Error: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Account</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    * {margin: 0; padding: 0; box-sizing: border-box;}
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #0072ff, #00c6ff); /* Blue gradient background */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        background: #fff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        width: 350px;
        text-align: center;
    }
    h2 {
        color: #0072ff;
        margin-bottom: 20px;
        font-weight: 600;
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
        background: #0072ff; /* Blue button */
        color: #fff;
        font-weight: 600;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s;
    }
    button:hover {
        background: #005ecb;
    }
    .message {margin-top: 15px;}
    .success a {color: #0072ff; text-decoration: none; font-weight: 600;}
    .success, .error {margin-top: 15px; color: #333; font-size: 14px;}
    /* Link for existing users */
    .login-link {
        margin-top: 15px;
        font-size: 14px;
        color: #555;
    }
    .login-link a {
        color: #0072ff;
        text-decoration: none;
        font-weight: 600;
    }
    .login-link a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Create Account</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Sign Up</button>
    </form>

    <div class="login-link">
        Already have an account? <a href="login.php">Login here</a>
    </div>

    <div class="message"><?= $message ?></div>
</div>
</body>
</html>
