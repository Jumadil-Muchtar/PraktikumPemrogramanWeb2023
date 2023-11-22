let balance = 50000;
let getBet = document.getElementById("bet");

let dealerSum = 0;
let yourSum = 0;

let dealerAceCount = 0;
let yourAceCount = 0;

let hidden;
let deck;

let canHit = true;
let isBet = false;

window.onload = function () {
  document.getElementById("start").addEventListener("click", start);
};

function start() {
  let getBet = document.getElementById("bet");
  let betvalue = getBet.value;


  if (betvalue == NaN || betvalue < 1) {
    alert("input your bet");
  }
  else if (betvalue > balance) {
    alert("your bet bigger than balance");
  } else {
    let getStartButton = document.getElementById("start");
    getStartButton.style.display = "none";

    getBet.style.display = "none";
    let getBetLabel = document.getElementById("betLabel");
    getBetLabel.style.display = "none";

    balance = balance - betvalue;
    document.getElementById("yourBalance").innerText = balance;

    buildDeck();
    shuffleDeck();
    startGame();
  }
}

function buildDeck() {
  let values = [
    "A",
    "2",
    "3",
    "4",
    "5",
    "6",
    "7",
    "8",
    "9",
    "10",
    "J",
    "Q",
    "K",
  ];
  let types = ["C", "D", "H", "S"];
  deck = [];

  for (let i = 0; i < types.length; i++) {
    for (let j = 0; j < values.length; j++) {
      deck.push(values[j] + "-" + types[i]); //A-C -> K-C, A-D -> K-D
    }
  }
}

function shuffleDeck() {
  for (let i = 0; i < deck.length; i++) {
    let j = Math.floor(Math.random() * deck.length); // (0-0,....) * 52 => (0-51.999999999)
    let temp = deck[i];
    deck[i] = deck[j];
    deck[j] = temp;
  }
  console.log(deck);
}

function startGame() {
  hidden = deck.pop();
  dealerSum += getValue(hidden);
  dealerAceCount += checkAce(hidden);

  let cardImg = document.createElement("img");
  let card = deck.pop();
  cardImg.src = "./cards/" + card + ".png";
  dealerSum += getValue(card);
  dealerAceCount += checkAce(card);
  document.getElementById("dealer-cards").append(cardImg);

  for (let i = 0; i < 2; i++) {
    let cardImg = document.createElement("img");
    let card = deck.pop();
    cardImg.src = "./cards/" + card + ".png";
    yourSum += getValue(card);
    yourAceCount += checkAce(card);
    document.getElementById("your-cards").append(cardImg);
  }
  yourSum = reduceAceYou(yourSum, yourAceCount);

  document.getElementById("your-sum").innerText = yourSum;

  document.getElementById("hit").addEventListener("click", hit);
  document.getElementById("stay").addEventListener("click", stay);

  balance = balance - betvalue;
  document.getElementById("yourBalance").innerText = balance;
}

function hit() {
  if (!canHit) {
    return;
  }
  let cardImg = document.createElement("img");
  let card = deck.pop();
  cardImg.src = "./cards/" + card + ".png";
  yourSum += getValue(card);
  yourAceCount += checkAce(card);
  document.getElementById("your-cards").append(cardImg);
  yourSum = reduceAceYou(yourSum, yourAceCount);
  // yourSum = reduceAce(yourSum, yourAceCount);

  if (yourSum > 21) {
    //A, J, 8 -> 1 + 10 + 8
    canHit = false;
  }
  document.getElementById("your-sum").innerText = yourSum;

  console.log(yourSum);
  console.log(yourAceCount);
}

function stay() {
  while (dealerSum < 17) {
    //<img src="./cards/4-C.png">
    let cardImg = document.createElement("img");
    let card = deck.pop();
    cardImg.src = "./cards/" + card + ".png";
    dealerSum += getValue(card);
    dealerAceCount += checkAce(card);
    document.getElementById("dealer-cards").append(cardImg);
  }
  dealerSum = reduceAce(dealerSum, dealerAceCount);
  yourSum = reduceAceYou(yourSum, yourAceCount);

  console.log(yourSum);
  console.log(yourAceCount);

  let getBet = document.getElementById("bet");
  let betvalue = parseInt(getBet.value);

  canHit = false;
  document.getElementById("hidden").src = "./cards/" + hidden + ".png";
  let message = "";

  if (yourSum > 21) {
    message = "You Lose!";
    balance = balance;
  } else if (dealerSum > 21) {
    message = "You win!";
    balance = balance + betvalue * 2;
  } else if (yourSum == dealerSum) {
    message = "Tie!";
  } else if (yourSum > dealerSum) {
    message = "You Win!";
    balance = balance + betvalue * 2;
  } else if (yourSum < dealerSum) {
    message = "You Lose!";
    balance = balance;
  }
  console.log(balance);

  let getTryagainButton = document.getElementById("tryAgain");
  getTryagainButton.removeAttribute("style");

  let getHitButton = document.getElementById("hit");
  getHitButton.style.display = "none";

  let getStayButton = document.getElementById("stay");
  getStayButton.style.display = "none";

  let betInput = document.getElementById("bet");
  betInput.removeAttribute("style");

  document.getElementById("yourBalance").innerText = balance;
  document.getElementById("dealer-sum").innerText = dealerSum;
  document.getElementById("your-sum").innerText = yourSum;
  document.getElementById("results").innerText = message;

  document.getElementById("tryAgain").addEventListener("click", tryAgain);
}

function tryAgain() {
  let getBet = document.getElementById("bet");
  let betvalue = getBet.value;
  if (betvalue == NaN || betvalue < 1) {
    alert("input your bet correctly");
  }
  else if (betvalue > balance) {
    alert("your bet bigger than balance");
  } else {
    let getDealercards = document.getElementById("dealer-cards");
    let getDealercards_img = getDealercards.getElementsByTagName("img");

    for (let i = getDealercards_img.length - 1; i >= 0; i--) {
      getDealercards_img[i].remove();
    }

    getDealercards.innerHTML = '<img id="hidden" src="./cards/BACK.png">';

    let getYourcards = document.getElementById("your-cards");
    let getYourcards_img = getYourcards.getElementsByTagName("img");
    for (let i = getYourcards_img.length - 1; i >= 0; i--) {
      getYourcards_img[i].remove();
    }

    let getHitButton = document.getElementById("hit");
    getHitButton.removeAttribute("style");

    let getStayButton = document.getElementById("stay");
    getStayButton.removeAttribute("style");

    let getTryagainButton = document.getElementById("tryAgain");
    getTryagainButton.style.display = "none";

    let betInput = document.getElementById("bet");
    betInput.style.display = "none";

    let getResults = document.getElementById("results");
    getResults.innerText = "";

    document.getElementById("dealer-sum").innerText = "";
    document.getElementById("your-sum").innerText = "";

    dealerSum = 0;
    dealerAceCount = 0;
    yourSum = 0;
    yourAceCount = 0;
    canHit = true;

    balance = balance - betvalue;
    document.getElementById("yourBalance").innerText = balance;

    buildDeck();
    shuffleDeck();
    startGame();
  }
}

function getValue(card) {
  let data = card.split("-"); // "4-C" -> ["4", "C"]
  let value = data[0]; //berisi nilai kartu

  if (isNaN(value)) {
    //A J Q K
    if (value == "A") {
      return 11;
    }
    return 10;
  }
  return parseInt(value);
}

function checkAce(card) {
  if (card[0] == "A") {
    return 1;
  }
  return 0;
}

function reduceAce(playerSum, playerAceCount) {
  while (playerSum > 21 && playerAceCount > 0) { //mengurangi playerSum sebesar 10 dan mengurangi playerAceCount sebanyak 1 selama playerSum lebih besar dari 21 dan masih ada Ace yang bisa diubah. Mengembalikan nilai akhir dari playerSum.
    playerSum -= 10;
    playerAceCount -= 1;
  }
  return playerSum;
}
function reduceAceYou(playerSum, playerAceCount) {
  while (playerSum > 21 && playerAceCount > 0) {
    playerSum -= 10;
    playerAceCount -= 1;
  }
  yourAceCount = playerAceCount; //menetapkan yourAceCount ke nilai playerAceCount 
  return playerSum;
}
