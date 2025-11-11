document.getElementById("loginBtn").addEventListener("click", () => {
  const username = document.getElementById("username").value.trim();
  const password = document.getElementById("passwrord").value.trim();

  if (!username) {
    alert("Please enter a username");
    return;
  }
 
  if (!password) {
    alert("Please enetr a valid password");
    return;
  }

  const loggedInUser = {
    username: username,
    password: password
  };

  document.getElementById("players-info").innerText =
    `Welcome ${username} | Chips: 1000`;

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
      console.log("Dealt cards:", data);

      const playersDiv = document.getElementById("players_cards");
      const communityDiv = document.getElementById("community_cards");

      playersDiv.innerHTML = "";
      communityDiv.innerHTML = "";

      // render player cards
      Object.entries(data.players_cards).forEach(([player, cards]) => {
        const cardHTML = cards
          .map(card => `<img src="assets/images/cards/${card.toLowerCase()}.png" alt="${card}" width="80">`)
          .join(" ");
        playersDiv.innerHTML += `
          <div class="player">
            <h4>${player}</h4>
            ${cardHTML}
          </div>
        `;
      });

      // render community cards
      if (data.community_cards && data.community_cards.length > 0) {
        const commHTML = data.community_cards
          .map(card => `<img src="assets/images/cards/${card.toLowerCase()}.png" alt="${card}" width="80">`)
          .join(" ");
        communityDiv.innerHTML = `
          <h4>Community Cards</h4>
          ${commHTML}
        `;
      }
    })
    .catch(error => {
      document.getElementById("players_cards").innerHTML =
        "Error dealing cards. Check PHP setup.";
      console.error(error);
    });
});
