<?php
$host = "localhost";  // Change to your host
$user = "root";       // Change to your database user
$pass = "";           // Change to your database password
$dbname = "secure_login"; // Change to your database name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
