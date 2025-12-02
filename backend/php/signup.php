<?php
session_start();
require_once __DIR__ . "/db.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
    exit;
}

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

if (empty($username) || empty($password)) {
    echo json_encode(["status" => "error", "message" => "Username and password required"]);
    exit;
}

// Check if username already exists
$stmt = $conn->prepare("SELECT id FROM players WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "Username already taken"]);
    exit;
}

// Hash the password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Insert new user
$stmt = $conn->prepare("INSERT INTO players (username, password_hash) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password_hash);

if ($stmt->execute()) {
    $_SESSION['username'] = $username;
    $_SESSION['userId'] = $stmt->insert_id;
    //echo json_encode(["status" => "success", "message" => "Signup successful"]);
} else {
    //echo json_encode(["status" => "error", "message" => "Database error: " . $stmt->error]);
}
