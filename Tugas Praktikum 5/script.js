let botSums = 0;
let mySums = 0;

let botASCards = 0;
let myASCards = 0;

let cards;
let isCanHit = true;

const startGameButton = document.getElementById("btn-start-game");
const takeCardButton = document.getElementById("btn-take");
const holdCardsButton = document.getElementById("btn-hold");
const topUpButton = document.getElementById("btn-top-up");

const mySumsElement = document.getElementsByClassName("my-sums")[0];
const myCardsElement = document.getElementsByClassName("my-cards")[0];
const myMoney = document.getElementById("my-money");
const inputMoney = document.getElementsByTagName("input")[0];

const botSumsElement = document.getElementsByClassName("bot-sums")[0];
const botCardsElement = document.getElementsByClassName("bot-cards")[0];

const resultElement = document.getElementById("result");

window.onload = () => {
  buildUserCards();
  shuffleCards();
  takeCardButton.setAttribute("disabled", true);
  holdCardsButton.setAttribute("disabled", true);
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

startGameButton.addEventListener("click", function () {
  if (parseInt(myMoney.textContent) < parseInt(inputMoney.value)){
    alert("Uang anda tidak cukup");
    return;
  } else {
    if (parseInt(inputMoney.value) <= 0){
      alert("Taruhan tidak boleh mines atau nol");
      return;
    } else {
      if (parseInt(myMoney.textContent) <= 0) {
        alert("Uang kamu habis");
        return;
      } else {
        if (startGameButton.textContent === "TRY AGAIN") {
          botSums = 0;
          mySums = 0;
          botASCards = 0;
          myASCards = 0;
          isCanHit = true;
          resultElement.textContent = "";
      
          const allCardsImage = document.querySelectorAll("img");
          for (let i = 0; i < allCardsImage.length; i++) {
            allCardsImage[i].remove();
          }
      
          let cardImg = document.createElement("img");
          cardImg.src = "/images/cards/BACK.png";
          cardImg.className = "hidden-card";
          botCardsElement.append(cardImg);
      
          buildUserCards();
          shuffleCards();
        }
      
        takeCardButton.disabled = false;
        holdCardsButton.disabled = false;
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
      }
    }
  }
});

takeCardButton.addEventListener("click", function () {
  if (!isCanHit) return;

  let cardImg = document.createElement("img");
  let card = cards.pop();
  cardImg.src = `/images/cards/${card}.png`;
  mySums += getValueOfCard(card);
  myASCards += checkASCard(card);
  mySumsElement.textContent = mySums;
  myCardsElement.append(cardImg);
// 
  if (reduceASCardValue(mySums, myASCards) > 21) isCanHit = false;
// 
  if (mySums > 21) {
    takeCardButton.disabled = true;
    holdCardsButton.disabled = true;
    startGameButton.disabled = false;
    resultElement.textContent = "Kamu Kalah";
    myMoney.textContent -= inputMoney.value;
  }
});

holdCardsButton.addEventListener("click", function () {
  setTimeout(() => {
    document.getElementsByClassName("hidden-card")[0].remove();
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
        isCanHit = false;
        addBotCards();
      } else {
        botSums = reduceASCardValue(botSums, botASCards);
        mySums = reduceASCardValue(mySums, myASCards);
        isCanHit = false;

        let message = "";
        if (mySums > 21 || mySums < botSums % 22) {
          message = "Kamu kalah!!";
          myMoney.textContent -= inputMoney.value;
        } else if (botSums > 21 || mySums % 22 > botSums % 22) {
          message = "Kamu menang!!";
          myMoney.textContent += inputMoney.value * 2;
          // myMoney.textContent = parseInt(myMoney.textContent) + parseInt(inputMoney.value);
        } else if (mySums === botSums) message = "SERI";

        resultElement.textContent = message;
        startGameButton.disabled = false;
        takeCardButton.disabled = true;
        holdCardsButton.disabled = true;
      }
    }, 1000);
  };
  addBotCards();
});

topUpButton.addEventListener("click", function () {
  // Mengasumsikan Anda memiliki input untuk jumlah top-up dengan id "top-up-amount"
  const topUpAmount = parseInt(document.getElementById("top-up-amount").value);

  if (topUpAmount <= 0) {
    alert("Masukkan jumlah top up yang valid.");
    return;
  }

  myMoney.textContent = parseInt(myMoney.textContent) + topUpAmount;
});

function getValueOfCard(card) {
  let cardDetail = card.split("-");
  let value = cardDetail[0];

  if (isNaN(value)) {
    // Kartu AS
    if (value == "A") return 11;
    // Kartu K, Q, J
    else return 10;
  }

  return parseInt(value);
}

function checkASCard(card) {
  if (card[0] == "A") return 1;
  else return 0;
}

function reduceASCardValue(sums, asCards) {
  while (sums > 21 && asCards > 0) {
    sums -= 10;
    asCards -= 1;
  }
  return sums;
}
