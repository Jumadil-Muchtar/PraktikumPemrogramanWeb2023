let botSums = 0; // tampung nilai
let mySums = 0;

let botASCards = 0; // tampung nilai as
let myASCards = 0;

let initialMoney = 5000; 
let cards; // tampung
let isCanHit = true;

let listKartu = [];

const startGameButton = document.getElementById("btn-start-game"); // untuk ambil id
const takeCardButton = document.getElementById("btn-take");
const holdCardsButton = document.getElementById("btn-hold");
const resetMoneyButton = document.getElementById("btn-reset");

const mySumsElement = document.getElementsByClassName("my-sums")[0]; // untuk tampung nilai div
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
  holdCardsButton.setAttribute("disabled", true); // aktifkan
};

function buildUserCards() {
  let cardTypes = ["H", "B", "S", "K"];
  let cardValues = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
  cards = [];

  for (let i = 0; i < cardTypes.length; i++) {
    for (let j = 0; j < cardValues.length; j++) {
      cards.push(cardValues[j] + "-" + cardTypes[i]);
    }
  } /// ambil nama kartu A-b 
}

function shuffleCards() {
  for (let i = 0; i < cards.length; i++) {
    let randomNum = Math.floor(Math.random() * cards.length); // math.floor bulatkan ke bawah
    let temp = cards[i];
    cards[i] = cards[randomNum];
    cards[randomNum] = temp;
  }
} // disini  random kartu disini dia acak

startGameButton.addEventListener("click", function () { // ketika di klik maka akan menjalankan fungsi
  const betAmount = parseFloat(inputMoney.value); // ambil nilai inputtaruhan

  if (betAmount < 0) {
    alert("inputan tidak bisa karena mines");
  }

  if (isNaN(betAmount) || betAmount <= 0) {
    alert("Please enter a bet amount");
    return; // muncul please.......
  }
  // Ambil jumlah uang yang dimiliki
  const moneyAmount = parseFloat(myMoney.textContent); // text content sudah ada nilai di kode

  // Cek apakah taruhan lebih besar dari uang yang dimiliki
  if (betAmount > moneyAmount) {
    alert("Taruhan melebihi jumlah uang yang dimiliki!");
    return; // Hentikan aksi jika taruhan lebih besar
  }

  if (moneyAmount == 0) {
    alert("Kamu tidak punya Uang, Game Over");
    return;
  }

  if (startGameButton.textContent === "TRY AGAIN") {
    botSums = 0;
    mySums = 0;
    botASCards = 0;
    myASCards = 0;
    isCanHit = true;
    resultElement.textContent = ""; // Menghapus pesan hasil dari putaran sebelumnya

    const allCardsImage = document.querySelectorAll("img");
    for (let i = 0; i < allCardsImage.length; i++) {
      allCardsImage[i].remove(); // remove atau menghapus semua kartu yang tturun
    }

    let cardImg = document.createElement("img");
    cardImg.src = "./images/cards/BACK.png";
    cardImg.className = "hidden-card";
    botCardsElement.append(cardImg); // tambahkan kartu tpi dibelakang yang kelihatan

    buildUserCards();
    shuffleCards();
  }

  takeCardButton.disabled = false; // non aktif ketika keluar try again
  holdCardsButton.disabled = false;
  startGameButton.textContent = "TRY AGAIN";
  startGameButton.setAttribute("disabled", true);  

  mySums = 0; // Mengatur nilai awal sums ke 0
  myCardsElement.innerHTML = ""; // Menghapus kartu-kartu sebelumnya
  listKartu = [];

  for (let i = 0; i < 2; i++) {
    let cardImg = document.createElement("img");
    let card = cards.pop();
    let cardValue = card.split("-")[0];
    listKartu.push(cardValue);
    cardImg.src = `./images/cards/${card}.png`;
    mySums = calculateBlackjackTotal(listKartu); 
    mySumsElement.textContent = mySums;
    myCardsElement.append(cardImg);
  }
});

takeCardButton.addEventListener("click", function () {
  if (!isCanHit) return;

  let cardImg = document.createElement("img");
  let card = cards.pop(); // pop tambahkan dalam array
  cardImg.src = `./images/cards/${card}.png`;
  listKartu.push(card.split("-")[0]);
  mySums = calculateBlackjackTotal(listKartu);
  myCardsElement.append(cardImg);
  mySumsElement.textContent = mySums;

  if (mySums > 21) {
    takeCardButton.disabled = true;
    holdCardsButton.disabled = true;
    startGameButton.disabled = false;
    resultElement.textContent = "KALAH";
    myMoney.textContent -= inputMoney.value; // berarti berkurang jumlah uang
  }
});

holdCardsButton.addEventListener("click", function () {
  setTimeout(() => {
    document.getElementsByClassName("hidden-card")[0].remove();
  }, 1000); // mengatur waktu dan menghapus

  const addBotCards = () => { //tambahkan kartu orang
    setTimeout(() => {
      let cardImg = document.createElement("img");
      let card = cards.pop();
      cardImg.src = `./images/cards/${card}.png`;
      botCardsElement.append(cardImg);
      botSums += calculateBlackjackTotal([card.split("-")[0]]);
      botSumsElement.textContent = botSums;

      if (botSums < 21) {
        addBotCards();
      } else {
        mySums = calculateBlackjackTotal(listKartu);
        botSums = calculateBlackjackTotal(card.split("-")[0]);

        let message = "";
        if (mySums > 21 || (mySums <= 21 && botSums <= 21 && mySums < botSums)) {
          message = "KALAH";
          myMoney.textContent -= inputMoney.value;
        } else if (botSums > 21 || (mySums <= 21 && botSums <= 21 && mySums > botSums)) {
          message = "MENANG";
          myMoney.textContent = parseFloat(myMoney.textContent) + inputMoney.value * 5;
        } else if (mySums === botSums) {
          message = "SERI";
        }

        resultElement.textContent = message;
        startGameButton.disabled = false;
        takeCardButton.disabled = true;
        holdCardsButton.disabled = true;
      }
    }, 1000);
  };
  addBotCards();
});

resetMoneyButton.addEventListener("click", function () {
  myMoney.textContent = initialMoney;
  // Juga perlu menghapus pesan hasil dari permainan sebelumnya, jika ada
  resultElement.textContent = "";
});

function checkASCard(card) {
  if (card[0] == "A") return 1;
  else return 0;
}
function calculateBlackjackTotal(cards) {
  let total = 0;
  let aceCount = 0;

  for (let card of cards) {
    if (card === 'A') {
      aceCount++;
      total += 1; // Assume the Ace is worth 1 initially
    } else if (['K', 'Q', 'J'].includes(card)) {
      total += 10; // Face cards are worth 10
    } else {
      total += parseInt(card); // Convert numerical cards to their integer values
    }
  }

  // Adjust the total to maximize the value of Aces (if possible)
  while (aceCount > 0 && total + 10 <= 21) {
    total += 10;
    aceCount--; // kalau ace coun lebih maka ace beruubah jadi 1 tetapi kalau lebih dari 21 maka ace 10
  }
return total;
}



