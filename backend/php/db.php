<?php
$host = "localhost";    // Laragon’s local server
$user = "root";         // default username
$pass = "";             // default password (empty)
$dbname = "poker_game"; // name of the database you created

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Database connected successfully!";
}
?>
