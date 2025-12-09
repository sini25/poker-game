<?php

/* curl usage
echo 'Welcome to the curl example';

//initialize cURL
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://localhost/poker-game/backend/php/example-json.php'); //basically we have connected with the curl
curl_setopt($ch, CURLOPT_RETURNTRANSFER. true); //receive the response from the curl

$server_response = curl_exec($ch);
//close of the curl initialization
curl_close($ch);

echo "<prev>" ;
print_r($server_reponse);
echo "</prev>";
*/

/*
try {
    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_URL => "http://www.google.com",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 20,
    ]);

    $body = curl_exec($ch);

    if ($body === false) {
        throw new Exception(curl_error($ch));
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpCode != 200) {
        throw new Exception("HTTP Code = " . $httpCode);
    }

    if (!$body) {
        throw new Exception("Body of file is empty");
    }

    curl_close($ch);

} catch (Exception $e) {
    echo $e->getMessage();
}
*/

//===basic variable===
$a = "text";
$$a = "Text for output";

echo "$text<br>";

$fruit = "apple";
$$fruit = "green";

echo $apple . "<br>" ;

//===multiple levels===

$a = "b"; 
$b = "c"; //$$a -> $b
$c = "hello"; //$$$a -> hello

echo  $$$a . " <br>";

//===using loops or arrays===

for($i = 1; $i <= 3; $i++) {
    ${"var".$i} = $i*10;

}

echo $var1 . "<br>"; //10
echo $var2 . "<br>"; //20
echo $var3 . "<br>"; //30

//associative array

$session_name = "user_id";
$$session_name = 100;

echo $user_id;

?>
