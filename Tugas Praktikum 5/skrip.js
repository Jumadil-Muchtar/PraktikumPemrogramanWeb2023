const VALUES = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K']
const SUITS = ['♠', '♥', '♣', '♦']

const CARD_MODEL = document.createElement('div');
CARD_MODEL.classList.add('card');

const DEALER = document.getElementById("dealer");
const PLAYER = document.getElementById("player");
const HIT_BUTTON = document.getElementById("hit-button");
const PASS_BUTTON = document.getElementById("pass-button");
const BUTTON_CONTAINER = document.getElementById("button-container");
const NOTICE = document.getElementById("notice");
const NEX_HAND_BUTTON = document.getElementById("next-hand-button");
const SUM_DEALER = document.getElementById("total-dealer")
const SUM_PLAYER = document.getElementById("total-player")

let allDecks = [];
let dealerHand = [];
let playerHand = [];
let totalPlayerCardValue = 0;
let totalDealerCardValue = 0;


function createDeck() {
    const deck = [];
    SUITS.forEach((suit) => {
        VALUES.forEach((value) => {
            const card = value + suit;
            // console.log(card);
            deck.push(card);
        });
    });
    return deck;
}
// output createDeck
// createDeck();
// console.log(createDeck());

// const shuffleDecks = (num) => {
//     for (let i = 0; i < num; i++) {
//         const newDeck = createDeck();
//         allDecks = [...allDecks, ...newDeck];
//     }
// }

function selectRandomCard() {
    const allDecks = createDeck();
    // math.random return number between 0 & 1 then multiply by length of alldecks to get the randomcard
    // math.floor never reach the length (length - 1)
    const randomIndex = Math.floor(Math.random() * allDecks.length);    // outputnya index kartu sesuai urutan
    const card = allDecks[randomIndex]                                 // outputnya kartu(value+suit)
    // utk keluarin kartu yg udh di select dri deck (keluarin si randomindex sebanyak 1)
    allDecks.splice(randomIndex, 1);
    // console.log(randomIndex);
    return card;
}
// console.log(allDecks.length);
// output selectRandomCard''
// const randomCard = selectRandomCard();
// console.log(randomCard);


// bagiin kartu ke dealer dan player masing2 2 -> yg munculin ke4 kartu
function dealHands() {
    // bikin array yg isinya 2 kartu random
    dealerHand = [selectRandomCard(), selectRandomCard()];
    console.log("kartu pertama", dealerHand[0]);
    console.log("kartu kedua", dealerHand[1]);
    totalDealerCardValue += calcValue(dealerHand);
    SUM_DEALER.innerHTML = "SUM = " + totalDealerCardValue;
    // masukin arraynya biar jdi didalem kartu
    dealerHand.forEach((card, index) => {
        const newCard = CARD_MODEL.cloneNode(true);
        index === 0 ? newCard.classList.add('back'): newCard.innerHTML = card;
        (card[card.length - 1] === '♦' || card[card.length - 1] === '♥') && newCard.setAttribute('data-red', true);
        DEALER.append(newCard);
    });
    playerHand = [selectRandomCard(), selectRandomCard()];
    totalPlayerCardValue += calcValue(playerHand);
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
        // console.log("calcvalue", card);
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

// untuk tombol hit (tambah kartu player), yg keluar cuma kalkulasi stlh hit
function hitPlayer() {
    const newCard = selectRandomCard();
    playerHand.push(newCard);
    totalPlayerCardValue += calcValue(playerHand);
    SUM_PLAYER.innerHTML = "SUM = " + totalPlayerCardValue;
    // playerHand.forEach((newCard) => {
    //     const newCard = CARD_MODEL.cloneNode(true);
    //     newCard.innerHTML = card;
    //     (card[card.length - 1] === '♦' || card[card.length - 1] === '♥') && newCard.setAttribute('data-red', true);
    //     PLAYER.append(newCard);
    // });
    const newCardNode = CARD_MODEL.cloneNode(true);
    newCardNode.innerHTML = newCard;
    // (newCard[newCard.length - 1] === '♦' || newCard[newCard.length - 1] === '♥') && newCard.setAttribute('data-red', true);        
    PLAYER.append(newCardNode);
    // const handValue = calcValue(playerHand);
    if (totalPlayerCardValue > 21) {
        console.log("you bust!");
        alert("you bust!");
    }
};


const decideWinner = () => {  //play it on the safe side
    // let dealerValue = calcValue(dealerHand);
    // let playerValue = calcValue(playerHand);

    alert(`Dealer has ${totalDealerCardValue}, you have ${totalPlayerCardValue}`)
    if (totalPlayerCardValue <= 21 && totalPlayerCardValue > totalDealerCardValue){
        alert("player wins!")
    } else {
        alert("dealer wins!")
    }
    // dealerValue > playerValue ? alert("dealer wins!") : alert("player wins!")
}

const hitDealer = () => {
    for (let i = 0; i < dealerHand.length; i++) {
        console.log("+",dealerHand[i]);
    }
    //flip green card
    const hiddenCard = DEALER.children[0];
    hiddenCard.classList.remove("back");
    //1 hapus semua card yg ada didealer, ambil objek pke getelementbyclass, hapus semua child
    //2 buat kartu sebanyak jumlah kartu dealer, 
    // while (dealerHand.length > 0) {
    //     dealerHand[0].parentNode.removeChild(cards[0]);
    // }
   

   


    // const newCardNode = CARD_MODEL.cloneNode(true);
    // newCardNode.innerHTML = newCard;
    // DEALER.append(newCard);
    hiddenCard.innerHTML = dealerHand[0];
    //calc hand value
    let handValue = totalDealerCardValue;
    console.log("sblm dicekkkkkk",totalDealerCardValue);
   


    if (handValue < 16) {
        console.log("before", totalDealerCardValue);
        let newCard = selectRandomCard();
        console.log(newCard);
        dealerHand.push(newCard);
        totalDealerCardValue += calcValue(dealerHand);
        console.log(totalDealerCardValue);
        for (let i = 0; i < dealerHand.length; i++) {
            console.log("-",dealerHand[i]);
        }
        SUM_DEALER.innerHTML = "SUM = " + totalDealerCardValue;
        const newCardNode = CARD_MODEL.cloneNode(true);
        newCardNode.innerHTML = newCard;
        // // (newCard[newCard.length - 1] === '♦' || newCard[newCard.length - 1] === '♥') && newCard.setAttribute('data-red', true);        
        DEALER.append(newCardNode)
        // handValue = calcValue(dealerHand);
    }
    for (let i = 0; i < dealerHand.length; i++) {
        console.log("++",dealerHand[i]);
    }

    if (handValue < 16) {
        hitDealer();
    }
    else if (handValue === 21) {
        alert("dealer has 21!")
    }
    else if (handValue > 21) {
        alert("dealer bust")
    }
    else {
        decideWinner();
    }
}
for (let i = 0; i < dealerHand.length; i++) {
    console.log("+++",dealerHand[i]);
}
// console.log(newCard);
HIT_BUTTON.addEventListener('click', hitPlayer);
PASS_BUTTON.addEventListener('click', hitDealer);

// shuffleDecks(1);
dealHands();

// value > 21 still win [done]
// the hit card is not red [pas hit cuma kartu item yg keluar + itungannya kacau]
// calcvalue cuma keitung stlh hit card