<?php
session_start();
require_once __DIR__ . "/db.php";

$db = new Database();       // create the object (database is the class and DB is the object)
$conn = $db->getConnection();  // now you get your mysqli connection

header('Content-Type: application/json');

//Log Function
function write_log($message) {
    $logFile = __DIR__ . "/log.txt";
    $timestamp = date("Y-m-d H:i:s");
    file_put_contents($logFile, "[$timestamp] $message\n", FILE_APPEND);
}

//handle get (cURL testing)
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    write_log("GET request received");
    echo json_encode(["status" => "error", "message" => "GET OK"]);
    exit;
}

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
    $_SESSION['userId'] = $conn->insert_id;
    //echo json_encode(["status" => "success", "message" => "Signup successful"]);
    write_log("Signup success for user: " . $username);
}
 else {
    //echo json_encode(["status" => "error", "message" => "Database error: " . $stmt->error]);
}

