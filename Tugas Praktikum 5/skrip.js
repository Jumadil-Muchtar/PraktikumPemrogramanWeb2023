const VALUES = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K']
const SUITS = ['♠', '♥', '♣', '♦']

const CARD_MODEL = document.createElement('div');
CARD_MODEL.classList.add('card');

const DEALER = document.getElementById("dealer");
const PLAYER = document.getElementById("player");
const HIT_BUTTON = document.getElementById("hit-button");
const PASS_BUTTON = document.getElementById("pass-button");
const PLAY_AGAIN_BUTTON = document.getElementById("play-button");
const START_BUTTON = document.getElementById("start-button");
const AMOUNT = document.getElementById("amount");
const BET = document.getElementById("bet");
const AMOUNT_P = document.getElementById("amount-p");
const SUM_DEALER = document.getElementById("total-dealer")
const SUM_PLAYER = document.getElementById("total-player")

let allDecks = [];
let dealerHand = [];
let playerHand = [];
let totalPlayerCardValue = 0;
let totalDealerCardValue = 0;
// let gameEnded = false;


const disableButtons = () => {
    HIT_BUTTON.disabled = true;
    PASS_BUTTON.disabled = true;
};


// untuk cek apakah saldo dan taruhan sudah terisi dgn benar
function beforeStart(){
    disableButtons();
    // konversi value amount jdi int
    const saldo = parseInt(AMOUNT.value);
    const taruhan = parseInt(BET.value);
    // isNaN untuk memeriksa apakah suatu nilai bukan angka 
    if (!isNaN(saldo) && !isNaN(taruhan) && saldo > 0 && taruhan > 0 && taruhan <= saldo) {
        START_BUTTON.disabled = false;
    } else {
        START_BUTTON.disabled = true;
    }
}


function createDeck() {
    console.log("LOG: creating deck.....");
    const deck = [];
    SUITS.forEach((suit) => {
        VALUES.forEach((value) => {
            const card = value + suit;
            deck.push(card);
        });
    });
    console.log("New deck : "+deck);
    return deck;
}


//definisikan createdeck diluar selectrandom spy jdi 1 deck
const blackjackDeck = createDeck();
function selectRandomCard() {
    // math.random return number between 0 & 1 then multiply by length of alldecks to get the randomcard
    // math.floor never reach the length (length - 1)
    const randomIndex = Math.floor(Math.random() * blackjackDeck.length);    // outputnya index kartu sesuai urutan
    const card = blackjackDeck[randomIndex]                                 // outputnya kartu(value+suit)
    // utk keluarin kartu yg udh di select dri deck (keluarin si randomindex sebanyak 1)
    blackjackDeck.splice(randomIndex, 1);
    // console.log(randomIndex);
    return card;
}


// bagiin kartu ke dealer dan player masing2 2 -> yg munculin ke4 kartu
function dealHands() {    
    START_BUTTON.disabled = true;
    HIT_BUTTON.disabled = false;
    PASS_BUTTON.disabled = false;

    // bikin array yg isinya 2 kartu random
    console.log("LOG: dealHands....");
    dealerHand = [selectRandomCard(), selectRandomCard()];
    console.log("dealer card : ", dealerHand);
    totalDealerCardValue = calcValue(dealerHand);
    console.log("total value of dealer card : ", totalDealerCardValue)
    SUM_DEALER.innerHTML = "SUM = guess? ";
    // masukin arraynya biar jdi didalem kartu
    dealerHand.forEach((card, index) => {
        const newCard = CARD_MODEL.cloneNode(true);
        index === 0 ? newCard.classList.add('back'): newCard.innerHTML = card;
        (card[card.length - 1] === '♦' || card[card.length - 1] === '♥') && newCard.setAttribute('data-red', true);
        DEALER.append(newCard);
    });

    playerHand = [selectRandomCard(), selectRandomCard()];
    console.log("player card : ", playerHand);
    totalPlayerCardValue = calcValue(playerHand);
    console.log("total value of dealer card : ", totalPlayerCardValue);
    SUM_PLAYER.innerHTML = "SUM = " + totalPlayerCardValue;
    playerHand.forEach((card) => {
        const newCard = CARD_MODEL.cloneNode(true);
        newCard.innerHTML = card;
        (card[card.length - 1] === '♦' || card[card.length - 1] === '♥') && newCard.setAttribute('data-red', true);
        PLAYER.append(newCard);
    });
}


function calcValue(hand) {
    let value = 0;
    let hasAce = 0;
    hand.forEach((card) => {
        if (card.length === 2) {
            if (card[0] === 'A') {
                hasAce += 1
            } else {
                (card[0] === 'K' || card[0] === 'Q' || card[0] === 'J') ? value += 10 : value += Number(card[0])
            }
        } else {
            value += 10
        }
    });
    if (hasAce > 0) {
        value + 11 > 21 ? value += 1 : value += 11;
        value += (hasAce-1)*1;
    }
    return value;
}


const messageDealer = document.getElementById("message-dealer");
function displayDealerWin() {
    messageDealer.textContent = "dealer win!";
}
function displayDealerBust() {
    messageDealer.textContent = "dealer bust!";
}

const messagePlayer = document.getElementById("message-player");
function displayPlayerWin() {
    messagePlayer.textContent = "player win!";
}
function displayPlayerBust() {
    messagePlayer.textContent = "player bust!";
}

const messageDraw = document.getElementById("message-draw");
function displayDraw(){
    messageDraw.textContent = "draw match"
}


// untuk menampilkan jumlah saldo setelah decidewinner
function countWin(){
    let saldo = parseInt(AMOUNT.value);
    let taruhan = parseInt(BET.value);

    saldo += taruhan;
    AMOUNT_P.innerHTML = "Saldo Anda sekarang: $" + saldo;
}
function countBust(){
    let saldo = parseInt(AMOUNT.value);
    let taruhan = parseInt(BET.value);

    saldo -= taruhan;
    AMOUNT_P.innerHTML = "Saldo Anda sekarang: $" + saldo;
}


function hitPlayer() {
    // if (gameEnded) {
    //     return;   // Do nothing if the game has already ended
    // }
    console.log("------------------------------------------------");
    console.log("LOG: hit player....");
    console.log("taking card.....");
    const newCard = selectRandomCard();
    console.log("new player card : ", newCard);
    playerHand.push(newCard);
    console.log("all player card : ", playerHand);
    totalPlayerCardValue = calcValue(playerHand);
    console.log("total value of player card : ", totalPlayerCardValue)

    SUM_PLAYER.innerHTML = "SUM = " + totalPlayerCardValue;
    const newCardNode = CARD_MODEL.cloneNode(true);
    newCardNode.innerHTML = newCard;
    // biar kartu tambahannya yg diamond sm heart warna merah
    if (newCard[newCard.length - 1] === '♦' || newCard[newCard.length - 1] === '♥') {
        newCardNode.setAttribute('data-red', true);
    }
    PLAYER.append(newCardNode);

    if (totalPlayerCardValue > 21) {
        displayPlayerBust();
        countBust();
        disableButtons(); 
        SUM_DEALER.innerHTML = "SUM = " + totalDealerCardValue;
    } else if (totalPlayerCardValue == 21) {
        displayPlayerWin();
        countWin();
        disableButtons(); 
        SUM_DEALER.innerHTML = "SUM = " + totalDealerCardValue;
    }
}

function decideWinner() {  
    if (totalPlayerCardValue <= 21 && totalPlayerCardValue > totalDealerCardValue){
        displayPlayerWin()
        countWin();
    } else if(totalPlayerCardValue > 21){
        displayPlayerBust();
        countBust();
    } else if(totalDealerCardValue > 21){
        displayDealerBust();
        countWin();
    } else if(totalDealerCardValue == totalPlayerCardValue){
        displayDraw();
    } else {
        displayDealerWin();
        countBust();
    }

    // gameEnded = true; 
    disableButtons();
    SUM_DEALER.innerHTML = "SUM = " + totalDealerCardValue;
}

function hitDealer() {
    // if (gameEnded) {
    //     return; // Do nothing if the game has already ended
    // }
    console.log("all dealer card : ", dealerHand);
    console.log("total value of dealer card :" + totalDealerCardValue);    
    console.log("------------------------------------------------");
    console.log("LOG: hit dealer....");
    console.log("taking card? or pass?");

    //flip green card
    const hiddenCard = DEALER.children[0];
    hiddenCard.classList.remove("back");
    hiddenCard.innerHTML = dealerHand[0];

    //calc hand value
    let handValue = totalDealerCardValue;
    if (handValue < 16) {
        console.log("Dealer taking card.....");
        let newCard = selectRandomCard();
        console.log("new card : "+ newCard);
        dealerHand.push(newCard);
        console.log("all card of dealer : ", dealerHand);
        totalDealerCardValue = calcValue(dealerHand);
        console.log("total value of dealer card : ", totalDealerCardValue);
        SUM_DEALER.innerHTML = "SUM = " + totalDealerCardValue;
        const newCardNode = CARD_MODEL.cloneNode(true);
        newCardNode.innerHTML = newCard;
        // biar kartu tambahannya yg diamond sm heart warna merah
        if (newCard[newCard.length - 1] === '♦' || newCard[newCard.length - 1] === '♥') {
            newCardNode.setAttribute('data-red', true);
        }
        DEALER.append(newCardNode);
        hitDealer();
    } else if (handValue === 21) {
        console.log("Dealer not taking card.....");
        SUM_DEALER.innerHTML = "SUM = " + totalDealerCardValue;
        displayDealerWin();
        countBust();
        disableButtons(); 
    } else if (handValue > 21) {
        console.log("Dealer not taking card.....");
        SUM_DEALER.innerHTML = "SUM = " + totalDealerCardValue;
        displayDealerBust();
        countWin();
        disableButtons(); 
    } else {
        decideWinner();
        disableButtons(); 
        SUM_DEALER.innerHTML = "SUM = " + totalDealerCardValue;
    }
}

// biar gamenya terulang lgi pas pencet tombol playagain
function loadGame(){
    location.reload();
    dealHands();
}


AMOUNT.addEventListener('input', beforeStart);
BET.addEventListener('input', beforeStart);

START_BUTTON.addEventListener('click', dealHands);
HIT_BUTTON.addEventListener('click', hitPlayer);
PASS_BUTTON.addEventListener('click', hitDealer);
PLAY_AGAIN_BUTTON.addEventListener('click', loadGame);

beforeStart();



// bikin saldo dan taruhan, pke label dan input
// bikin kondisinya
// alur: masukin saldo dan taruhan sblm main
//      klo player menang, saldo = saldo+taruhan
//      klo player kalah, saldo = saldo