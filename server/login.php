<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    // Securely fetch user info
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();  // Store the result to check row count

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        // Check if password is correct
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "❌ Invalid credentials. <a href='../public/index.html'>Try again</a>";
        }
    } else {
        echo "⚠️ User not found. <a href='../public/register.html'>Register</a>";
    }

    $stmt->close();
    $conn->close();
}
?>
