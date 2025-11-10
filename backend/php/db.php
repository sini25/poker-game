<?php
$host = "localhost";    // Laragon’s local server
$user = "root";         // default username
$pass = "123456";             // default password (empty)
$dbname = "poker_game"; // name of the database you created

$conn = new mysqli("localhost", "root", "123456", "poker_game");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Database connected successfully!";
}
?>
