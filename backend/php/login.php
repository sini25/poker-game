<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . "/db.php"; // <-- Missing slash fixed

header("Content-type: application/json");

$username = $_POST['username'] ?? '';

// Validation block
if ($username == '') {
    echo json_encode(["status" => "error", "message" => "Username required"]);
    exit;
}

// Check if players already exists
$query = $conn->prepare("SELECT * FROM players WHERE username = ?");
$query->bind_param("s", $username);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $players = $result->fetch_assoc();
} else {
    // Create new player
    $insert = $conn->prepare("INSERT INTO players (username, chips) VALUES (?, 1000)");
    $insert->bind_param("s", $username);
    $insert->execute();

    $players = [
        "id" => $insert->insert_id,
        "username" => $username,
        "chips" => 1000
    ];
}

// Final response to frontend
echo json_encode(["status" => "success", "players" => $players]);
