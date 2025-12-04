<?php
session_start();
require_once __DIR__ . "/db.php"; // Make sure this path is correct

$db = new Database();       // create the object
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

// Only handle POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
    exit;
}

// Get username and password from POST
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

if (empty($username) || empty($password)) {
    echo json_encode(["status" => "error", "message" => "Username and password required"]);
    exit;
}

// Prepare query to get user
$stmt = $conn->prepare("SELECT id, username, password_hash FROM players WHERE username = ?");
if (!$stmt) {
    echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
    exit;
}

$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Check if password column exists and is not null
    if (!isset($user['password_hash']) || empty($user['password_hash'])) {
        //echo json_encode(["status" => "error", "message" => "Password not set for this user"]);
        exit;
    }

    // Verify password
    if (password_verify($password, $user['password_hash'])) {
        // Successful login
        $_SESSION['username'] = $user['username'];
        $_SESSION['userId'] = $user['id'];
        //echo json_encode(["status" => "success", "message" => "Login successful"]);
        write_log("Login success for user: " . $user['username']);
    } else {
       //echo json_encode(["status" => "error", "message" => "Invalid password"]);
       write_log("Login failed: invalid password for user: " . $username);
    }
} else {
    //echo json_encode(["status" => "error", "message" => "User not found"]);
    write_log("Login failed: user not found: " . $username);
}

write_log("Login successful for $username");

/*
$color = "black";
switch ($color) {
    case "black":
        echo "Your favorite color is black";
        break;
    case "blue":
        echo "Your favorite color is blue";
        break;
    case "green":
        echo "Your favorite color is green";
        break;
    default:
    echo "Your favorite color is neither red, blue and nor green!";
}
*/