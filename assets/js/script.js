document.getElementById("dealBtn").addEventListener("click", () => {
  const username = document.getElementById("username").value.trim();
  if (!username) {
    alert("Please enter a username");
    return;
  }
  fetch("php/login.php", {
    method: "POST",
    HEADERS: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "username" + encodedURIComponent(username)
  })

  .then(res => res.json())
  .then(data => {
    if (data.status == "success") {
      const player = data.player;
      document.getElementById("login-container").style.display = "none";
      document.getElementById("game-container").style.display = "block";
      document.getElementById("player-info").innerText =
      `Welcome, ${player.username} Chips: ${player.chips}`;
    } 
    else
    {
      alert(data.message);
      }
  })
  .catch(err => console.error(err));
    
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
