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
?>
