<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to Your Secure Dashboard!</h2>
    <p>You are logged in.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
