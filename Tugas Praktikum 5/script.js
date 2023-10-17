let botSums = 0;
let mySums = 0;

let cards;
let isCanHit = true;


const startGameButton = document.getElementById("btn-start-game");
const takeCardButton = document.getElementById("btn-take");
const holdCardsButton = document.getElementById("btn-hold");

const mySumsElement = document.getElementsByClassName("my-sums")[0];
const myCardsElement = document.getElementsByClassName("my-cards")[0];
const myMoney = document.getElementById("my-money");
const inputMoney = document.getElementsByTagName("input")[0];

const botSumsElement = document.getElementsByClassName("bot-sums")[0];
const botCardsElement = document.getElementsByClassName("bot-cards")[0];

const resultElement = document.getElementById("result"); 

function redirectToGamePage() {
  window.location.href = "index.html";
}

window.onload = function () {
  buildUserCards();  
  shuffleCards(); 
  takeCardButton.setAttribute("disabled", true); //tombol take a card di nonaktifkan ketika tombol start ditekan 
  holdCardsButton.setAttribute("disabled", true); 
};

function buildUserCards() { 
  let cardTypes = ["H", "B", "S", "K"]; //H untuk Heart, B untuk belah ketupat, S untuk skop, K untuk bunga yg keriting
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
    for (let j = 0; j < cardValues.length; j++) { //digunakan untuk mengakses indeks dari nilai kartu dalam array cardValues.
      cards.push(cardValues[j] + "-" + cardTypes[i]);
    }
  }
}

function shuffleCards() { 
  for (let i = 0; i < cards.length; i++) {
    let randomNum = Math.floor(Math.random() * cards.length);  
    let temp = cards[i]; //smtra sblm ditukar 
    cards[i] = cards[randomNum]; //Nilai kartu di indeks ke-i digantikan dengan nilai kartu yang terpilih secara acak 
    cards[randomNum] = temp; //krtu yg suda di acak kmudian brubah mnjdi krtu yg i
  }
}

startGameButton.addEventListener("click", function () {
  if (startGameButton.textContent === "TRY AGAIN") { 
    botSums = 0; 
    mySums = 0;
    isCanHit = true;

    botSumsElement.textContent = '';

    const allCardsImage = document.querySelectorAll("img"); //memilih semua elemen img dn di hps 
    for (let i = 0; i < allCardsImage.length; i++) {
      allCardsImage[i].remove();
    }

    let cardImg = document.createElement("img");  
    cardImg.src = "/images/cards/kartutertutup.png";
    cardImg.className = "hidden-card";
    botCardsElement.append(cardImg); //menampilkan gambar kartu tertutup 

    buildUserCards(); 
    shuffleCards();
  }

  takeCardButton.disabled = false; 
  holdCardsButton.disabled = false;
  startGameButton.textContent = "TRY AGAIN"; //mengganti teks pada tombol "startGameButton" menjadi "TRY AGAIN"
  startGameButton.setAttribute("disabled", true); 


  
  for (let i = 0; i < 2; i++) { 
    let cardImg = document.createElement("img"); 
    let card = cards.pop(); 
    cardImg.src = `/images/cards/${card}.png`; 
    mySums += getValueOfCard(card); 
    mySumsElement.textContent = mySums; 
    myCardsElement.append(cardImg); 

  }
});

takeCardButton.addEventListener("click", function () {
  if (!isCanHit) return; 

  let cardImg = document.createElement("img"); 
  let card = cards.pop(); 
  cardImg.src = `/images/cards/${card}.png`;
  mySums += getValueOfCard(card); 
  mySumsElement.textContent = mySums;
  myCardsElement.append(cardImg);

  if (mySums > 21) { 
    takeCardButton.disabled = true; 
    holdCardsButton.disabled = true;
    startGameButton.disabled = false; 
    resultElement.textContent = "KALAH: SILAHKAN BERMAIN LAGI "; 
    myMoney.textContent -= inputMoney.value;
  }
});



holdCardsButton.addEventListener("click", function () {
  setTimeout(function () {
    document.getElementsByClassName("hidden-card")[0].remove();
  } , 1000);


  function addBotCards() {
    setTimeout(function () { 
      let cardImg = document.createElement("img"); 
      let card = cards.pop();
      cardImg.src = `/images/cards/${card}.png`; 
      botSums += getValueOfCard(card);
      botCardsElement.append(cardImg); 
      botSumsElement.textContent = botSums; 

      
      if (botSums < 21) { 
        addBotCards();
      } else { 
        isCanHit = false;

        let message = "";
        if (mySums > 21  || mySums % 22 < botSums % 22) {  
          message = "KALAH: SILAHKAN BERMAIN LAGI";
          myMoney.textContent = parseInt(myMoney.textContent) - inputMoney.value;
        } else if (botSums  < 21 || mySums % 22 > botSums % 22) {
          message = "SELAMAT ANDA MEMENANGKAN PERMAINAN";
          myMoney.textContent = parseInt(myMoney.textContent) + inputMoney.value * 5;
        } else if (mySums === botSums) message = "SERI";

        resultElement.textContent = message;
        startGameButton.disabled = false;
        takeCardButton.disabled = true;
        holdCardsButton.disabled = true;
      }
    }, 1000);
  }

  addBotCards();
});

function getValueOfCard(card) {
  let cardDetail = card.split("-"); //membagi string card menjadi dua bagian dengan memisahkan string berdasarkan tanda "-" menggunakan split("-"). Hasilnya adalah array cardDetail, di mana elemen pertama adalah nilai kartu (seperti "A" atau "7") dan elemen kedua adalah jenis kartu (seperti "Hearts" atau "Diamonds").
  let value = cardDetail[0]; //mengambil nilai kartu (elemen pertama dari array) dan menyimpannya dalam variabel value.

  if (isNaN(value)) { 
    // Kartu AS
    if (value == "A") return 11;
    // Kartu K, Q, J
    else return 10;
  }

  return parseInt(value);
}
