document.getElementById("loginBtn").addEventListener("click", () => {
  const username = document.getElementById("username").value.trim();
  if (!username) {
    alert("Please enter a username");
    return;
  }
 loggedInUser = username;

 document.getElementById("loginBtn").addEventListener.style.dsiplay = "none";
 document.getElementById("dealBtn").addEventListener.style.display = "block";
 
  console.log("Sending username:", username);

  fetch("backend/php/login.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "username=" + encodeURIComponent(username)
  })
    .then(res => res.json())
    .then(data => {
      if (data.status === "success") {
        const players = data.players;
        document.getElementById("login-container").style.display = "none";
        document.getElementById("game-container").style.display = "block";
        document.getElementById("players-info").innerText =
          `Welcome, ${players.username} | Chips: ${players.chips}`;
      } else {
        alert(data.message);
      }
    })
    .catch(error => console.error("Fetch error:", error));
});

document.getElementById("dealBtn").addEventListener("click", () => {
  const username = document.getElementById("username")?.value.trim();
  if (!username) {
    alert("Please Log in first");
    return;
  }

  fetch("backend/php/deal_cards.php")
    .then(response => response.json())
    .then(data => {
      document.getElementById("players-cards").innerHTML = `
        <img src="assets/images/cards/${data.card1}.png">
        <img src="assets/images/cards/${data.card2}.png">
      `;
    })
    .catch(error => {
      document.getElementById("players-cards").innerHTML =
        "Error dealing cards. Check PHP setup.";
      console.error(error);
    });
});
