<?php
header('Content-Type: application/json');

$cards = ["AS", "AH", "AD", "AC", "2S", "2H", "2D", "2C", "3S", "3H", "3D", "3C"]; 
shuffle($cards);

echo json_encode([
  "card1" => $cards[0],
  "card2" => $cards[1]
]);
?>
