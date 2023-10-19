let botSums = 0;
let mySums = 0;
let botASCards = 0;
let myASCards = 0;
let cards;
let isCanHit = true;

const startGameButton = document.getElementById("btn-start-game");
const hitCardButton = document.getElementById("btn-hit");
const standCardButton = document.getElementById("btn-stand");
const mySumsElement = document.querySelector(".my-sums");
const myCardsElement = document.querySelector(".my-cards");
const myMoney = document.getElementById("my-money");
const inputMoney = document.getElementById("input-money");
const botSumsElement = document.querySelector(".bot-sums");
const botCardsElement = document.querySelector(".bot-cards");
const resultElement = document.getElementById("result");

window.onload = () => {
  buildUserCards();
  shuffleCards();
  hitCardButton.setAttribute("disabled", true);
  standCardButton.setAttribute("disabled", true);
};

function buildUserCards() {
  let cardTypes = ["H", "B", "S", "K"];
  let cardValues = [
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
    "K",
    "Q",
    "J",
  ];
  cards = [];

  for (let i = 0; i < cardTypes.length; i++) {
    for (let j = 0; j < cardValues.length; j++) {
      cards.push(cardValues[j] + "-" + cardTypes[i]);
    }
  }
}

function shuffleCards() {
  for (let i = 0; i < cards.length; i++) {
    let randomNum = Math.floor(Math.random() * cards.length);
    let temp = cards[i];
    cards[i] = cards[randomNum];
    cards[randomNum] = temp;
  }
}

inputMoney.addEventListener("keydown", function (event) {
  if (event.key === "Enter") {
    event.preventDefault(); // Menghentikan pengiriman formulir bawaan
    startGameButton.click(); // Memanggil peristiwa klik pada tombol "Start Game"
  }
});

startGameButton.addEventListener("click", function () {
  const moneyInputValue = inputMoney.value;
  if (moneyInputValue === "" || parseInt(moneyInputValue) <= 0) {
    alert("Masukkan Jumlah Taruhan yang valid.");
    return;
  }

  if (parseInt(moneyInputValue) > parseInt(myMoney.textContent)) {
    alert("Taruhan Anda Tidak Sesuai Dompet.");
    return;
  }

  if (myMoney.textContent <= 0) {
    alert("Minimal Punya Uang Dekk");
    return;
  }

  if (startGameButton.textContent === "TRY AGAIN") {
    botSums = 0;
    mySums = 0;
    botASCards = 0;
    myASCards = 0;
    isCanHit = true;
    const allCardsImage = document.querySelectorAll("img");
    for (let i = 0; i < allCardsImage.length; i++) {
      allCardsImage[i].remove();
    }

    let cardImg = document.createElement("img");
    cardImg.className = "hidden-card";
    botCardsElement.append(cardImg);
    resultElement.textContent = "";
    buildUserCards();
    shuffleCards();
  }

  hitCardButton.disabled = false;
  standCardButton.disabled = false;
  startGameButton.textContent = "TRY AGAIN";
  startGameButton.setAttribute("disabled", true);

  for (let i = 0; i < 2; i++) {
    let cardImg = document.createElement("img");
    let card = cards.pop();
    cardImg.src = `/images/cards/${card}.png`;
    mySums += getValueOfCard(card);
    myASCards += checkASCard(card);
    mySumsElement.textContent = mySums;
    myCardsElement.append(cardImg);
  }
});

hitCardButton.addEventListener("click", function () {
  if (!isCanHit) return;

  let cardImg = document.createElement("img");
  let card = cards.pop();
  cardImg.src = `/images/cards/${card}.png`;
  mySums += getValueOfCard(card);
  myASCards += checkASCard(card);
  mySumsElement.textContent = mySums;
  myCardsElement.append(cardImg);

  if (reduceASCardValue(mySums, myASCards) > 21) isCanHit = false;

  if (mySums > 21) {
    hitCardButton.disabled = true;
    standCardButton.disabled = true;
    startGameButton.disabled = false;
    resultElement.textContent = "You Lose";
    myMoney.textContent -= inputMoney.value;
  }
});

standCardButton.addEventListener("click", function () {
  setTimeout(() => {
    document.querySelector(".hidden-card").remove();
  }, 1000);

  const addBotCards = () => {
    setTimeout(() => {
      let cardImg = document.createElement("img");
      let card = cards.pop();
      cardImg.src = `/images/cards/${card}.png`;
      botSums += getValueOfCard(card);
      botASCards += checkASCard(card);
      botCardsElement.append(cardImg);
      botSumsElement.textContent = botSums;

      if (botSums < 18) {
        addBotCards();
      } else {
        botSums = reduceASCardValue(botSums, botASCards);
        mySums = reduceASCardValue(mySums, myASCards);
        isCanHit = false;

        if (mySums > 21 || mySums < botSums) {
          resultElement.textContent = "You Lose";
          myMoney.textContent =
            parseInt(myMoney.textContent) - parseInt(inputMoney.value);
        } else if (botSums > 21 || mySums > botSums) {
          resultElement.textContent = "You Won";
          myMoney.textContent =
            parseInt(myMoney.textContent) + parseInt(inputMoney.value);
        } else if (mySums === botSums) {
          resultElement.textContent = "Draw";
        }

        startGameButton.disabled = false;
        hitCardButton.disabled = true;
        standCardButton.disabled = true;
      }
    }, 1000);
  };

  addBotCards();
});

function getValueOfCard(card) {
  let cardDetail = card.split("-");
  let value = cardDetail[0];

  if (isNaN(value)) {
    if (value === "A") return 11;
    else return 10;
  }

  return parseInt(value);
}

function checkASCard(card) {
  if (card[0] === "A") return 1;
  else return 0;
}

function reduceASCardValue(sums, asCards) {
  while (sums > 21 && asCards > 0) {
    sums -= 10;
    asCards -= 1;
  }
  return sums;
}
