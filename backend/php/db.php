<?php

$host = "localhost";    // Laragon’s local server
$user = "root";         // default username
$pass = "123456";             // default password (empty)
$dbname = "poker_game"; // name of the database you created

$conn = new mysqli($host, $user, $pass, $dbname); // $conn is the object here class is the mysqli

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/*else {
    echo "✅ Database connected successfully!"; this thing not alligned with the json file 
}
*/ 

?>
