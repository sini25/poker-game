<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 0);

require_once __DIR__ . "/db.php"; 

header("Content-type: application/json");

$username = $_POST['username'] ?? '';
$password_hash = $_POST['password_hash'] ?? '';

// Validation block
if (empty($username) ) {
    echo json_encode(["status" => "error", "message" => "Username required"]);
    exit;
}

if (empty($password_hash) ) {
    echo json_encode(["status" => "error", "message" => "Username required"]);
    exit;
}


// Check if players already exists
$query = $conn->prepare("SELECT * FROM players WHERE username = ? AND password_hash = ?");
$query->bind_param("ss", $username, $password_hash);
$query->execute();
$result = $query->get_result();


if ($result->num_rows > 0) {
    $players = $result->fetch_assoc();

    if (!isset($players['password_hash']) || !password_verify($password_hash, $players['password_hash'])) {
        echo json_encode(["status" => "error", "message" => "Incorrect password"]);
        exit;
    }

    // Password is correct
    echo json_encode(["status" => "success", "players" => $players]);
    exit;

} else {
    // user doesn’t exist
    echo json_encode(["status" => "user_not_found", "message" => "Please sign up first"]);
    exit;

}

   