document.getElementById("dealBtn").addEventListener("click", () => {
    
  fetch("backend/php/deal_cards.php")
    .then(response => response.json())
    .then(data => {
      document.getElementById("player-cards").innerHTML =
       `
        <img src="assets/images/cards/${data.card1}.png" >
        <img src="assets/images/cards/${data.card2}.png" >
      `;
    })
    .catch(error => {
      document.getElementById("player-cards").innerHTML =
        "Error dealing cards. Check PHP setup.";
      console.error(error);
    });
});
