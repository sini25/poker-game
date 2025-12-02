//login
document.getElementById("loginBtn").addEventListener("click", () => {
  const username = document.getElementById("login_username").value.trim();
  const password = document.getElementById("login_password").value.trim();

  if (!username) {
    alert("Please enter a username");
    return;
  }

  if (!password) {
    alert("Please enter a valid password");
    return;
  }

  console.log("Sending username:", username);

  fetch("backend/php/login.php", {
    method: "POST",
    credentials: "include",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "username=" + encodeURIComponent(username) +
          "&password=" + encodeURIComponent(password)
  })
    .then(res => res.json())
    .then(data => {
      console.log(data);
      if (data.status === "success") {
        document.getElementById("players-info").innerText =
          `Welcome ${data.players.username} | Chips: ${data.players.chips}`;
      } else {
        alert(data.message);
      }
    })
    .catch(error => console.error("Fetch error:", error));
});


//signup
document.getElementById("signupBtn").addEventListener("click", () => {
  const username = document.getElementById("signup_username").value.trim();
  const password = document.getElementById("signup_password").value.trim();

  if (!username || !password) {
    alert("Please enter both username and password");
    return;
  }

  fetch("backend/php/signup.php", {
    method: "POST",
    credentials: "include",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "username=" + encodeURIComponent(username)
        + "&password=" + encodeURIComponent(password)
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === "success") {
      alert(`Signup successful! Welcome ${data.players.username}`);
      // Optionally auto-login the user
      document.getElementById("players-info").innerText =
        `Welcome ${data.players.username} | Chips: ${data.players.chips}`;
    } else {
      alert(data.message);
    }
  })
  .catch(err => console.error("Signup error:", err));
});

//deal cards
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
