<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 0);

require_once __DIR__ . "/db.php"; 
header("Content-Type: application/json");

$username = $_POST['username'] ?? '';
$password_hash = $_POST['password'] ?? '';

// Validate inputs
if (empty($username) || empty($password_hash)) {
    echo json_encode(["status" => "error", "message" => "Username and password required"]);
    exit;
}

// Check if username already exists
$query = $conn->prepare("SELECT * FROM players WHERE username = ? AND password_hash = ? ");
$query->bind_param("ss", $username , $password_hash);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "Username already taken"]);
    exit;
}

// Hash the password
$password_hash = password_hash($password_hash, PASSWORD_DEFAULT);

// Insert new player
$insert = $conn->prepare("INSERT INTO players (username, password_hash, chips) VALUES (?, ?, 1000)");
$insert->bind_param("ss", $username, $password_hash);
$insert->execute();

echo json_encode([
    "status" => "success",
    "players" => [
        "id" => $insert->insert_id,
        "username" => $username,
        "chips" => 1000
    ]
]);
