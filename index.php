<?php
session_start();

if (isset($_SESSION["username"])) {
    echo "Logged in: " . $_SESSION["username"];
} else {
    echo "Not logged in. Please log in.";
}

//random way to create a cookie
//setcookie("userPref", "darkMode", time() + 3600, "/", "", false, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Poker Table </title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Lato:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/global.css">    
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="page-wrapper">
    <div id="login-container">
    <h2>Enter your name to start the game</h2>
    <form id="loginForm" method="POST" >
        <input id="login_username" type="text" name="username" placeholder="Enter username" required><br>
        <input id="login_password" type="password" name="password" placeholder="Password" required><br>
        <button type="button" id="loginBtn">Login</button>
    </form>
    <div>
    <div id="signup-container">
        <h2>Please signup to start the game</h2>
    <form id="signupForm" method="POST" action="backend/php/index.php">
        <input id="signup_username" type="text" name="username" placeholder="Enter username" required><br>
        <input id="signup_password" type="password" name="password" placeholder="Password" required><br>
        <button type="button" id="signupBtn" >Signup</button>
    </form>
    </div>
</div>
     <!--<div id="new-user"></div>--> 

    <div id="banner">
        <!--<img src="assets/images/banner.jpg"  alt="Poker Banner">-->
    </div>

    <div class="game-container">
        <h1>
            <img src="assets/images/games.png" style="width:100px; vertical-align:middle;">
            Poker Table Game
        </h1>

        <div id="players-info" class="info-bar"></div>

        <div class="table">
            <div id="players_cards" class="card-container">Your cards will appear here </div>
            <div id="community_cards" class="card-container"></div>

            <button id="dealBtn"> Deal Cards </button>
            
        </div>
        </div>
        </div>
    <script src="assets/js/script.js"></script>
</body>

</html>
