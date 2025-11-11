<?php
header('Content-Type: application/json');

// === Create full deck ===
$suits = ['S', 'H', 'D', 'C'];
$ranks = ['A', 'K', 'Q', 'J', '10', '9', '8', '7', '6', '5', '4', '3', '2'];

$deck = [];
foreach ($suits as $suit) {
  foreach ($ranks as $rank) {
    $deck[] = $rank . $suit;
  }
}

// === Shuffle ===
shuffle($deck);

// === Ensure deck is array ===
if (!is_array($deck)) {
  echo json_encode(["error" => "Deck is not an array"]);
  exit;
}

// === Deal to players ===
$players_cards = [
  "player1" => [$deck[0], $deck[1]],
  "player2" => [$deck[2], $deck[3]]
];

// === Deal community cards (flop + turn + river) ===
$community_cards = array_slice($deck, 4, 5);

// === Response ===
$response = [
  "players_cards" => $players_cards,
  "community_cards" => $community_cards
];

echo json_encode($response, JSON_PRETTY_PRINT);
?>
