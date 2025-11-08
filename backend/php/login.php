<?php
require_once "db.php";

header("Content-type: application/json");

$username = $_POST['username'] ?? '';

if ($username == '') {
  echo json_encode(["status" => "error", "message" => "Username required"]);
  exit;
}

// Check if player already exists
$query = $conn->prepare("SELECT * FROM players WHERE username = ?");
$query->bind_param("s", $username);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
  $player = $result->fetch_assoc();
} else {
  // Create new player
  $insert = $conn->prepare("INSERT INTO players (username) VALUES (?)");
  $insert->bind_param("s", $username);
  $insert->execute();

  $player = [
    "id" => $insert-> insert_id,
    "username" => $username,
    "chips" => 1000
  ];
}

echo json_encode(["status" => "success", "player" => $player]);
