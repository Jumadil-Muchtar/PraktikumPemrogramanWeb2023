const body = document.body;

let modalAwal = 5000;

let total = document.getElementById("total-bet");
total.textContent = "Jumlah Uang Anda : $" + modalAwal;

let taruhan = document.getElementById("input-bet");
let nilaiTaruhan = 0;
let startbtnclicked = false;
let totalKartuPlayer = 0;
let totalKartuComputer = 0;

let nilaiKartu = {
    "2_of_clubs": 2,
    "3_of_clubs": 3,
    "4_of_clubs": 4,
    "5_of_clubs": 5,
    "6_of_clubs": 6,
    "7_of_clubs": 7,
    "8_of_clubs": 8,
    "9_of_clubs": 9,
    "10_of_clubs": 10,
    "jack_of_clubs": 10,
    "queen_of_clubs": 10,
    "king_of_clubs": 10,
    "ace_of_clubs": 11,
    "2_of_hearts": 2,
    "3_of_hearts": 3,
    "4_of_hearts": 4,
    "5_of_hearts": 5,
    "6_of_hearts": 6,
    "7_of_hearts": 7,
    "8_of_hearts": 8,
    "9_of_hearts": 9,
    "10_of_hearts": 10,
    "jack_of_hearts": 10,
    "queen_of_hearts": 10,
    "king_of_hearts": 10,
    "ace_of_hearts": 11,
    "2_of_spades": 2,
    "3_of_spades": 3,
    "4_of_spades": 4,
    "5_of_spades": 5,
    "6_of_spades": 6,
    "7_of_spades": 7,
    "8_of_spades": 8,
    "9_of_spades": 9,
    "10_of_spades": 10,
    "jack_of_spades": 10,
    "queen_of_spades": 10,
    "king_of_spades": 10,
    "ace_of_spades": 11,
    "2_of_diamonds": 2,
    "3_of_diamonds": 3,
    "4_of_diamonds": 4,
    "5_of_diamonds": 5,
    "6_of_diamonds": 6,
    "7_of_diamonds": 7,
    "8_of_diamonds": 8,
    "9_of_diamonds": 9,
    "10_of_diamonds": 10,
    "jack_of_diamonds": 10,
    "queen_of_diamonds": 10,
    "king_of_diamonds": 10,
    "ace_of_diamonds": 11,
};

deck = [];

function acakKartu() {
    let nilaiKartu = ["ace", "2", "3", "4", "5", "6", "7", "8", "9", "10", "jack", "queen", "king"];
    let suitKartu = ["clubs", "diamonds", "hearts", "spades"];

    if (deck.length === 0) {
        for (let i = 0; i < suitKartu.length; i++) {
            for (let j = 0; j < nilaiKartu.length; j++) {
                let card = nilaiKartu[j] + "_of_" + suitKartu[i];
                deck.push(card);
            }
        }
    }

    let index = Math.floor(Math.random() * deck.length);
    let kartu = deck[index];
    deck.splice(index, 1);

    return kartu;
}

function appendCardImage(element, kartu) {
    let image = document.createElement("img");
    image.src = "images/cards/" + kartu + ".png";
    image.style.width = "70px";
    image.style.height = "90px";
    image.style.paddingBottom = "0px";
    element.appendChild(image);
}

function playAgain() {
    let retrybutton = document.createElement("button")
    retrybutton.textContent = "TRY AGAIN"
    retry.appendChild(retrybutton)
    retrybutton.style.height = "40px"
    retrybutton.style.backgroundColor = "red";
    retrybutton.style.Color = "white";
    retrybutton.style.borderRadius = "15px";
    retrybutton.style.width = "120px";
}

function computerWin() {
    winner.textContent = "Komputer Menang!";
}

function playerWin() {
    winner.textContent = "Player Menang!";
}

document.getElementById("hit-button").disabled = true;
document.getElementById("hold-button").disabled = true;

document.getElementById("start-button").addEventListener("click", function () {
    nilaiTaruhan = parseInt(inputbet.value);
    inputbet.value = ""
    if (!isNaN(nilaiTaruhan) && nilaiTaruhan > 0 && nilaiTaruhan <= modalAwal) {
        modalAwal -= nilaiTaruhan;

        document.getElementById("hit-button").disabled = false;
        document.getElementById("hold-button").disabled = false

        document.getElementById("start-button").disabled = true;

        total.textContent = "Jumlah Uang Anda : $" + modalAwal;

        let kartuPlayer1 = acakKartu();
        let kartuComputer1 = acakKartu();

        totalKartuPlayer += nilaiKartu[kartuPlayer1];
        totalKartuComputer += nilaiKartu[kartuComputer1];

        let h5player1 = document.createElement("h5");
        h5player1.textContent = kartuPlayer1;

        playerSums = document.getElementById("player-sums")
        playerSums.textContent = "PLAYER SUMS: " + totalKartuPlayer;

        let kartuPlayer = document.getElementById("player_cards");
        appendCardImage(kartuPlayer, kartuPlayer1);

        let h5 = document.createElement("h5");
        h5.textContent = kartuComputer1;

        computerSums = document.getElementById("ai-sums")
        computerSums.textContent = "AI SUMS: " + totalKartuComputer;

        let kartuComputer = document.getElementById("ai_cards");
        appendCardImage(kartuComputer, kartuComputer1);

        startbtnclicked = true;

    } else {
        alert("Taruhan tidak valid atau modal anda kurang.");
    }
});

document.getElementById("hit-button").addEventListener("click", function () {
    if (startbtnclicked && totalKartuPlayer <= 21) {
        let playerCardValue = acakKartu();
        totalKartuPlayer += nilaiKartu[playerCardValue];

        playerSums.textContent = "PLAYER SUMS: " + totalKartuPlayer;
        kartuPlayer = document.getElementById("player_cards");
        appendCardImage(kartuPlayer, playerCardValue)
        console.log(playerCardValue)
        if (totalKartuPlayer > 21) {
            winner.textContent = "~ YOU LOSE ~";
            playAgain();

            document.getElementById("hit-button").disabled = true;
            document.getElementById("hold-button").disabled = true;
        }
    }
});

document.getElementById("hold-button").addEventListener("click", function () {
    if (startbtnclicked) {
        while (totalKartuComputer < totalKartuPlayer) {
            let kartuComputer1 = acakKartu();
            totalKartuComputer += nilaiKartu[kartuComputer1];

            let h5 = document.createElement("h5");
            h5.textContent = kartuComputer1;
            computerSums.textContent = "AI SUMS: " + totalKartuComputer;
            let kartuComputer = document.getElementById("ai_cards");
            appendCardImage(kartuComputer, kartuComputer1)
        }

        if (totalKartuComputer >= totalKartuPlayer && totalKartuComputer <= 21) {
            computerWin();
            playAgain();

            document.getElementById("hit-button").disabled = true;
            document.getElementById("hold-button").disabled = true;
        } else {
            let menang = nilaiTaruhan * 2;
            modalAwal += menang;
            total.textContent = "Jumlah Uang Anda : $" + modalAwal;

            playerWin();
            playAgain();
        }
        document.getElementById("hit-button").disabled = true;
        document.getElementById("hold-button").disabled = true;
    }
});

document.getElementById("retry").addEventListener("click", function () {
    totalKartuPlayer = 0;
    totalKartuComputer = 0;

    playerSums = document.getElementById("player-sums");
    playerSums.textContent = "PLAYER SUMS: "

    computerSums = document.getElementById("ai-sums");
    computerSums.textContent = "AI SUMS: "

    while (player_cards.firstChild) {
        player_cards.removeChild(player_cards.firstChild);
    }

    while (ai_cards.firstChild) {
        ai_cards.removeChild(ai_cards.firstChild);
    }

    winner.textContent = "";

    document.getElementById("start-button").disabled = false;

    document.getElementById("hit-button").disabled = true;
    document.getElementById("hold-button").disabled = true;

    retry.textContent = "";

});

let computerSums = document.getElementById("ai-sums");
computerSums.textContent = "AI SUMS: "

let playerSums = document.getElementById("player-sums");
playerSums.textContent = "PLAYER SUMS: "