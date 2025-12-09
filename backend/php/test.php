<?php 
 
$username = "divya";
$password = "1234";
$is_banned = false;
$is_verified = true;
$login_attempts = 2;   // how many times user entered wrong password before

/* 
====IF ELSE IF ERROR====
 if ($is_banned) {
   echo "Account is banned. Access denied";
}
//if($is_verrified != true) vs if(!$is_verrified) are same
else if($is_verrified != true){
   echo "Please verify your email.";
}
else if ($password !== "1234") {
     
   if($login_attempts >= 3)
   {
      echo "Too many attempts.Account locked.";
   }
   else
   {
      echo "Incorrect Pasword!";
   }
}

else {

    echo "Login Succesful.Welcome!";

}
*/
 

/*
====FOR LOOPS====
for ($i=1; $i <= 10; $i++){
   echo $i . " " ;
}

for ($i=2; $i <= 20; $i += 2){
    echo $i . " " ;
}

for ($i=10; $i >= 1; $i--){
   echo $i . " " ;
}
*/

/*
$fruits = ["apple", "banana", "cherry", "date"];

for ($i = 0; $i < count($fruits); $i++) {
   echo $i . ": " . $fruits[$i] . "\n";
}
*/
/*
for($i = 1; $i <=3; $i++){
  // echo $i . "";
   for ($j = 1; $j<=3; $j++){
      echo $j * $i . " ";
   }
   echo "<br />";
}
*/
/*
$rows = 4;

for($i = 1; $i <= $rows; $i++){
   for ($j = 1; $i <= $rows; $j++){
      echo "*";
   }
   echo "<br />";
}
*/

/*
$is_verified = true;
$is_banned = false;
$balance = 50;
$price = 30;


if(!$is_verified) {
   echo "Please verify your account";
}
else if ($is_banned == true) {
   echo "Access denied";
}
else if ($balance <= $price) {
   echo "Insufficient balance";
}
else 
{
   echo "payment succesful";
   echo "<br  \>";

echo "numbers divisible by 5 up to your balance: ";

for ($i = 1; $i <= $balance; $i++) {
   if ($i % 5 == 0) {
      echo $i . " ";
   }
}

}
*/


 /*
$attempt = 1;
$max_attempts = 3;

while ($attempt <= $max_attempts) {
   echo "Attempt $attempt<br>";

   $attempt++;
}
*/

/*
$is_logged_in = false;
$login_attempts = 2;

$item = ["mami","apple", "pie", "soup", "milk"];

   if (!$is_logged_in){

      echo "Please log in first<br>";


      while($login_attempts < 3) {
         echo "please try again";
         $login_attempts++;
         }
            echo "Login failed.<br>";
      }

      // If logged in
      else {

         echo" Welcome! Select an item:<br><br>";


         for ($i = 0; $i < count($item); $i++)
         echo "Item 1: " . ($i+1) . ": " . $item[$i] . "<br>"; 
     
         }
      echo "Order confirmed";
   
*/
 
/*
$students = ["Ali", "Bala", "Cindy", "Divya"]; 
$absent = 0;

for ($i = 0; $i < count($students); $i++) {

   if ($students[$i] == "Divya") {
      echo $students[$i] . "is present<br>";
       $absent++;
   }
   else {
      echo $students[$i] . " is absent<br>";
     
   }

}

echo "<br> Total absent students: " . $absent;
*/

/*
$students = ["Ali", "Bala", "Cindy", "Divya"]; 
$counter = 0;

for ($i = 0; $i < count($students); $i++) {
   echo "$students[$i] " . "<br>";

   if ($students[$i] == "Divya") {
      echo $students[$i]  . " is Present<br>";
   }
   else {
      echo $students[$i]  . " is Absent<br>";
      $counter++;
   }
}
   echo "total number student absent " . $counter;
*/

/*
$scores = [
    ["name"=>"Ali", "score"=>45],
    ["name"=>"Bala", "score"=>78],
    ["name"=>"Cindy", "score"=>92],
    ["name"=>"Divya", "score"=>60]
];

$counter_pass = 0;
$counter_fail = 0;
// 1. FOR loop through scores
// 2. IF score >= 50 → "Pass", ELSE → "Fail"
// 3. Count total passes using a counter
// 4. Count total fails using a counter

for($i = 0; $i < count($scores); $i++){
    
   if($scores[$i]["score"] >= 50)
   {
      echo $scores[$i]["name"] . $scores[$i]["score"] . " Pass <br>";
      $counter_pass++;
   }
   else {
      echo $scores[$i]["name"] . $scores[$i]["score"] . " Fail <br>";
      $counter_fail++;
   }
}

echo "Total passes" . $counter_pass++;
echo "Total passes" . $counter_fail++;

*/
/*
$users = ["Ali"=>false, "Bala"=>true, "Cindy"=>false]; // true = logged in
$counter= 0;
$max_attempts = 3;
// 1. FOR loop through users
// 2. IF logged in → print "Welcome"
//    ELSE → WHILE login attempts < $max_attempts → print "Try again"
// 3. Count number of users who successfully logged in


foreach ($users as $name => $is_logged_in) {
   $attempts = 0;

   if($is_logged_in){
      echo "$name: .  Welcome<br>";
      $counter++;
   }
   else {
      while($attempts < $max_attempts){
         echo "$name: Try again! Attempt " . ($attempts+1) . "<br>";
         $attempts++;
      }
   }
}

echo "Total number of users logged in . $counter";
*/

/*
$i = 1;
$j = 2;

while($i <10){
   echo "$i";
   switch( $i * $j) {
      case 10: //reading the value of the $i * $j
         echo " * $j = 10";
         break 2; // break 2 means break out of two levels of loops
         // level 1 is hwile loop and level 2 is switch 
      //case 16: //reading the value of the $i * $j
         //echo " * $j = 10";
         //break 2;   
   }
   echo " <br>";
   $i++;
}

*/
 
$balance = 120; 
$bet_amount = 30;
$bonus_type = "Welcome";
$attempts = 0;
$bonus_value = 0;

if ($bet_amount >= $balance) {

   while ($attempts < 3) {
      echo "Top up required (Attempt " . ($attempts + 1) .  "<br>";
      $attempts++;
   
      echo "All retries used. Bet cannot be placed.<br>";
      exit;
      }
   }

//Otheriwse Bet is accepted
else {
   echo "Bet accepted!<br>";

   //simulate 5 rounds
   switch(strtoupper($bonus_type)){
      case "WELCOME":
         $bonus_value = 10;
         break;
      case "DAILY":
          $bonus_value = 5;
         break;
      case "NONE":
      default :
       $bonus_value = 0;
         break;
   }
    
}

//simulate the 5 rounds of the bet
for ($round = 1; $round <=5; $round++){
   echo "Round $round: Bet placed<br>";
}

 echo "Bonus applied: $bonus_type (+ " . $bonus_value . ")<br><br>";

 echo "Updating balance:<br>";


 $balance_after = $balance - $bet_amount + $bonus_value;

 echo "New Balance: " . $balance_after . "<br>";
?>
<br>
<?php

$wallet = 80;
$bet = 20;
$free_spin = true; 
$max_rounds = 5;
$tries = 0;


if ($bet > $wallet){
   
   //user gets 3 tries
   while($tries < 3){
      echo "Top up required! Attempt no :" . ($tries + 1) . "<br>";
      $tries++;
      switch($tries){
         case 3:
            echo "Bet too high, top up required!!<br>";
         break 2;
         exit;

      }

   }

}
//otherwise the bet is accepted
else {
   echo "Bet accepted<br>";
}
  
$round = 1;

for ($round = 1 ; $round <= 5; $round++){
   echo  "Round $round " . ": Bet placed<br>";
    switch($round){
      case 1: 
         if($free_spin){
         echo "Free spin activated!<br>";}
         break;
      case 3:
         echo "Big win chance<br>";
         break;
      default :
       echo "Normal Round<br>";
         break;
         exit;
    }
       
   }  
echo "Game finished<br>";
?>
<br>
<?php


$numbers = array(4, 6, 2, 22, 11);
asort($numbers);

$arrlength = count($numbers);
for ($x = 0; $x < $arrlength; $x++) {
   echo $numbers[$x];
   echo "<br>";
}
/*
$players = [
   ["name" => "Ali", "score" => 80],
   ["name" => "Bala", "score" => 55],
   ["name" => "Cindy", "score" => 92],
   ["name" => "Divya", "score" => 60]
];

usort($players['score']);

echo "$players['score']";
*/
?>

<?php

$input_json = '[
  {"user":"Divya","betType":"exact","number":7,"amount": 10,"tags":"vip,new"},
  {"user":"Ali","betType":"big","number":0,"amount":30,"tags":"bonus"},
  {"user":"Cindy","betType":"small","number":0,"amount":10,"tags":""}
]';


$bets = json_decode($input_json, true);

//====Function: Validate username======

function validateUsername($name) {
   if (strlen($name) < 3) return false;
   if (mb_strpos($name, "bad") !== false) return false; //
   return true;
}


//====Game Logic Start====

$results = [];

foreach ($bets as $bet) {

    $user   = $bet["user"];
    $type   = $bet["betType"];
    $number = $bet["number"];
    $amount = $bet["amount"];
    $tags   = $bet["tags"];

    
    //====Username validation====
    if (!validateUsername($user)) {
        $results[] = [
            "user" => $user,
            "error" => "Invalid username"
        ];
        continue;
    }

 
    //====Check bet amount using WHILE====
    $tries = 0;
    while ($amount <= 0 && $tries < 3) {
        $tries++;
        $amount++; // fake correction just to exit loop
    }

    if ($amount <= 0) {
        $results[] = [
            "user" => $user,
            "error" => "Invalid bet amount"
        ];
        continue ;
    }

    
    //====Exact bet must have valid number====
    if ($type == "exact") {
        if (!($number >= 1 && $number <= 10)) {
            $results[] = [
                "user" => $user,
                "error" => "Number must be 1–10 for exact bet"
            ];
            continue ;
        }
    }

   
    //====Convert tags: explode + implode====
    $tagArray = explode(",", $tags);
    $cleanTags = implode("-", $tagArray);


    
    //====GAME ROUND – Random outcome====
    $roll = rand(1, 10);
    $win = 0;

   
    //====SWITCH logic for bet type====
    switch ($type) {

        case "exact":
            if ($roll == $number) {
                $win = $amount * 10;
            }
            break;

        case "small":
            if ($roll >= 1 && $roll <= 5) {
                $win = $amount * 2;
            }
            break;

        case "big":
            if ($roll >= 6 && $roll <= 10) {
                $win = $amount * 2;
            }
            break;

        default:
            $results[] = ["user" => $user, "error" => "Invalid bet type"];
            continue 2 ;
    }

    
    //====Save result with timestamp====
    $results[] = [
        "user" => $user,
        "betType" => $type,
        "amount" => $amount,
        "roll" => $roll,
        "win" => $win,
        "tags" => $cleanTags,
        "time" => date("Y-m-d H:i:s")
    ];
}



// SORT RESULTS by winnings DES
usort($results, function($a, $b) {
    return ($b["win"] ?? 0) <=> ($a["win"] ?? 0);
});



// PREPARE FINAL RESPONSE
$json_output = json_encode($results);
$base64 = base64_encode($json_output);
$hash = md5($base64);


// FINAL OUTPUT
echo "<pre>";
print_r([
    "players" => $results,
    "encoded" => $base64,
    "hash" => $hash
]);
echo "</pre>";


?>
