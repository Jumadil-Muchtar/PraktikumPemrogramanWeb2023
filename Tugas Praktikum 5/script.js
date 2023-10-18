let botSums = 0; // menyimpan total nilai kartu yang dimiliki oleh bot
let mySums = 0; // menyimpan total nilai kartu yang dimiliki oleh pemain (kamu)

let botASCards = 0; // variabel yang digunakan untuk menghitung jumlah kartu as (kartu bernilai 1 atau 11)
let myASCards = 0; // variabel yang digunakan untuk menghitung jumlah kartu as (kartu bernilai 1 atau 11)

let cards;
let isCanHit = true; // Variabel boolean yang menentukan apakah pemain masih bisa mengambil kartu tambahan atau tidak

const startGameButton = document.getElementById("btn-start-game"); // Mengambil elemen HTML dengan ID "btn-start-game" dan menyimpannya dalam variabel startGameButton
const takeCardButton = document.getElementById("btn-take");
const holdCardsButton = document.getElementById("btn-hold");
const resetButton = document.getElementById("btn-reset");

const mySumsElement = document.getElementsByClassName("my-sums")[0]; // indeks 0 = elemen pertama
const myCardsElement = document.getElementsByClassName("my-cards")[0];
const myMoney = document.getElementById("my-money");
const inputMoney = document.getElementsByTagName("input")[0];

const botSumsElement = document.getElementsById("bot-sums")[0]; 
const botCardsElement = document.getElementsById("bot-cards")[0];

const resultElement = document.getElementById("result");

window.onload = () => { // menetapkan sebuah fungsi ke onload dari objek window
  buildUserCards(); 
  shuffleCards(); // mengacak kartu
  takeCardButton.setAttribute("disabled", true); // tombol tambah kartu dinonaktifkan saat halaman dimuat
  holdCardsButton.setAttribute("disabled", true); // tombol tutup kartu dinonaktifkan saat halaman dimuat
};

function buildUserCards() { // mendeklarasikan fungsi
  let cardTypes = ["H", "B", "S", "K"]; // jenis-jenis kartu, yaitu hati (H), keriting (B), sekop (S), dan wajik (K)
  let cardValues = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"]; // nilai-nilai kartu
  cards = []; // deklarasi variabel cards sebagai array kosong

  for (let i = 0; i < cardTypes.length; i++) {  // let i = 0, digunakan sebagai indeks untuk mengakses elemen-elemen array cardTypes
                                                // i < cardTypes.length, kondisi yang harus dipenuhi agar loop dijalankan, berlanjut selama nilai i kurang dari panjang array cardTypes
                                                // i++, Setiap kali loop dijalankan, nilai i akan bertambah satu
    for (let j = 0; j < cardValues.length; j++) {
      cards.push(cardValues[j] + "-" + cardTypes[i]); // kartu dibuat dan ditambahkan ke array cards menggunakan metode push()
                                                      // nilai dari cardValues[j] dan cardTypes[i] digabungkan dengan tanda "-" di antaranya. contoh A-B : AS Keriting
    }
  }
}

function shuffleCards() { // deklarasi fungsi mengacak kartu
  for (let i = 0; i < cards.length; i++) {
    let randomNum = Math.floor(Math.random() * cards.length); // mengacak kartu
    let temp = cards[i]; // variabel sementara yang digunakan untuk menyimpan nilai kartu pada indeks i dalam array cards
    cards[i] = cards[randomNum]; // menukar nilai kartu pada indeks i dengan nilai kartu pada indeks randomNum
    cards[randomNum] = temp; // menukar nilai kartu pada indeks randomNum dengan nilai kartu yang disimpan dalam variabel sementara temp
  }
}

startGameButton.addEventListener("click", function () { // Ketika button diklik, fungsi yang diberikan sebagai argumen dijalankan
  const inputMoneyValue = inputMoney.value.trim(); // trim() untuk menghapus spasi ekstra dari awal dan akhir nilai yang diambil, kemudian disimpan dalam variabel inputMoneyValue.
  if (!inputMoneyValue) { // memeriksa inputan
    // console.log(inputMoneyValue)
    alert("Silakan isi jumlah duit kamu sebelum memulai permainan."); // muncul pesan jika input kosong atau hanya berisi spasi
  return; // menghentikan eksekusi
  }

  const moneyAmount = parseInt(inputMoneyValue);

  if (isNaN(moneyAmount) || moneyAmount <= 0) { // memeriksa apakah moneyAmount bukan angka atau kurang dari atau sama dengan nol
    alert("Masukkan jumlah duit yang benar (angka positif).");
    return;
  }

  if (moneyAmount > parseInt(myMoney.textContent)) { // memeriksa apakah moneyAmount lebih besar dari uang yang tersedia
    alert("Maaf dik, uang kamu tidak cukup");
    return;
  }

  if (parseInt(myMoney.textContent) <= 0) { // memeriksa apakah uang yang tersedia sudah habis atau tidak cukup
    alert("Maaf dik, uang kamu habis. Silakan top up uang kamu");
    return;
  } 

  if (startGameButton.textContent === "Coba lagi") { // memeriksa apakah teks pada tombol startGameButton adalah "Coba lagi". Jika ya, diatur ulang ke nilai awalnya
    botSums = 0;
    mySums = 0;
    botASCards = 0;
    myASCards = 0;
    isCanHit = true;
    message = "";
    botSumsElement.textContent = '';

    // Hapus semua kartu yang ada di myCards
    const myCards = document.getElementsByClassName("my-cards")[0];
    while (myCards.firstChild) {
      myCards.removeChild(myCards.firstChild);
    }

    // Hapus semua kartu yang ada di botCards
    const botCards = document.getElementsByClassName("bot-cards")[0];
    while (botCards.firstChild) {
      botCards.removeChild(botCards.firstChild);
    }

    // menampilkan kartu belakang untuk kartu-kartu bot di awal permainan
    let cardImg = document.createElement("img");
    cardImg.src = "/images/cards/BACK.png";
    cardImg.className = "hidden-card";
    botCardsElement.append(cardImg); // Memasukkan elemen gambar yang baru dibuat (kartu bagian belakang) ke dalam elemen dengan kelas "bot-cards"

    buildUserCards();
    shuffleCards();
  }

  takeCardButton.disabled = false; // mengaktifkan button tambah kartu
  holdCardsButton.disabled = false; // mengaktifkan button tutup kartu
  startGameButton.textContent = "Coba lagi"; // mengubah teks pada button start game menjadi "Coba lagi"
  startGameButton.disabled = true; // menonaktifkan button start game  

  // Hapus semua kartu yang ada di myCards
  const myCards = document.getElementsByClassName("my-cards")[0];
  while (myCards.firstChild) {
    myCards.removeChild(myCards.firstChild);
  }

  // Reset mySums menjadi 0
  mySums = 0;

  for (let i = 0; i < 2; i++) {
    if (cards.length > 0) { // memeriksa apakah masih ada kartu yang tersedia dalam array cards sebelum mengambil kartu. Jika tidak, loop tidak akan menjalankan iterasi selanjutnya.
      let cardImg = document.createElement("img"); // Membuat elemen img baru yang akan menampilkan gambar kartu.
      let card = cards.pop(); // menghapus dan mengembalikan elemen terakhir dari array
      cardImg.src = `/images/cards/${card}.png`;
      mySums += getValueOfCard(card); // Menambahkan nilai kartu yang diambil ke dalam mySums
      myASCards += checkASCard(card); // memeriksa apakah kartu yang diambil adalah kartu As dan mengembalikan nilai numerik yang sesuai
      mySumsElement.textContent = mySums; // menampilkan total nilai kartu pengguna setelah kartu baru ditambahkan
      myCardsElement.append(cardImg); 
    }
  }
  resultElement.textContent = message; // menampilkan pesan seperti menang, kalah, atau seri
});

takeCardButton.addEventListener("click", function () { // Ketika button diklik, fungsi yang diberikan sebagai argumen dijalankan
  if (!isCanHit) return; // menandakan apakah pemain masih diizinkan untuk mengambil kartu tambahan

  let cardImg = document.createElement("img");
  let card = cards.pop(); // mengambil kartu teratas dari tumpukan kartu
  cardImg.src = `/images/cards/${card}.png`;
  mySums += getValueOfCard(card); // menambahkan nilai kartu yang diambil ke dalam total nilai kartu pemain
  myASCards += checkASCard(card); // memeriksa apakah kartu yang diambil adalah kartu As dan mengembalikan nilai numerik yang sesuai
  mySumsElement.textContent = mySums; // memperbarui tampilan total nilai kartu pemain setelah kartu baru ditambahkan
  myCardsElement.append(cardImg); // kartu yang baru diambil akan ditampilkan

  if (reduceASCardValue(mySums, myASCards) > 21) isCanHit = false; // mengurangi nilai kartu As. kalo sudah dikurangi dan nilainya masih lebih dari 21, maka tidak boleh mengambil kartu lagi

  if (mySums > 21) { // memeriksa apakah total nilai kartu pemain melebihi 21. Jika ya, pemain telah kalah
    takeCardButton.disabled = true; // menonaktifkan button
    holdCardsButton.disabled = true;
    startGameButton.disabled = false;
    resultElement.textContent = "Kamu kalah hahahaha!";
    myMoney.textContent -= inputMoney.value; // Mengurangkan nilai uang pemain dengan jumlah taruhan
  }
});

holdCardsButton.addEventListener("click", function () {
  setTimeout(() => {
    document.getElementsByClassName("hidden-card")[0].remove();
  }, 1000); // menggunakan setTimeout() untuk menunggu 1000 milidetik atau 1 detik sebelum menjalankan fungsi yang menghapus hidden card

  const addBotCards = () => { // menambahkan kartu-kartu kepada pemain bot setelah kita memutuskan untuk menahan kartu
    setTimeout(() => { // dijalankan setelah 1000 milidetik atau 1 detik berlalu
      let cardImg = document.createElement("img");
      let card = cards.pop();
      cardImg.src = `/images/cards/${card}.png`;
      botSums += getValueOfCard(card); // Menambahkan nilai kartu yang diambil ke dalam total nilai kartu pemain bot
      botASCards += checkASCard(card); // memeriksa apakah kartu yang diambil adalah kartu As dan mengembalikan nilai numerik yang sesuai
      botCardsElement.append(cardImg); // menampilkan gambar kartu
      botSumsElement.textContent = botSums; // menampilkan total nilai kartu pemain bot setelah kartu baru ditambahkan

      if (botSums < 18) { // ika total nilai kartu pemain bot kurang dari 18, pemain bot akan mengambil kartu tambahan
        addBotCards();
      } else {
        botSums = reduceASCardValue(botSums, botASCards); // mengurangi nilai kartu As dari total nilai kartu pemain bot jika total nilai kartu lebih dari 21.
        mySums = reduceASCardValue(mySums, myASCards);
        isCanHit = false; // menandakan bahwa tidak ada pemain yang diizinkan untuk mengambil kartu tambahan lagi

        let message = ""; // mendeklarasikan sebagai string kosong
        if (mySums > 21 || mySums % 22 < botSums % 22) { // memeriksa apakah total nilai kartu kamu melebihi 21 atau lebih rendah daripada total nilai kartu pemain bot 
          message = "Kamu kalah hahahaha!";
          myMoney.textContent -= inputMoney.value; // uang berkurang
        } else if (botSums > 21 || mySums % 22 > botSums % 22) { // memeriksa apakah total nilai kartu pemain bot melebihi 21 atau lebih rendah daripada total nilai kartu kamu
          message = "Yeay kamu menang!";
          myMoney.textContent = parseInt(myMoney.textContent) + parseInt(inputMoney.value); // uang bertambah
        } else if (mySums === botSums) message = "Yahahaha seri"; // memeriksa apakah total nilai kartu kamu sama dengan total nilai kartu pemain bot

        resultElement.textContent = message; // Mengubah teks konten dari elemen untuk menampilkan pesan hasil permainan yang disimpan dalam variabel message
        startGameButton.disabled = false; // Mengaktifkan button Mulai game
        takeCardButton.disabled = true; // menonaktifkan button Ambil Kartu
        holdCardsButton.disabled = true; // menonaktifkan button Tahan Kartu
      }
    }, 1000);
  };

  addBotCards();
});

resetButton.addEventListener('click', function () { // kembali kayak awal
  myMoney.textContent = '100000';

  // Hapus semua kartu dari pemain
  const myCards = document.getElementsByClassName('my-cards')[0];
  while (myCards.firstChild) {
    myCards.removeChild(myCards.firstChild);
  }

  // Hapus semua kartu dari bot
  const botCards = document.getElementsByClassName('bot-cards')[0];
  while (botCards.firstChild) {
    botCards.removeChild(botCards.firstChild);
  }

   const botSums = document.getElementsByClassName('bot-sums')[0];
  while (botSums.firstChild) {
    botSums.removeChild(botSums.firstChild);
  }

  const mySums = document.getElementsByClassName('my-sums')[0];
  while (mySums.firstChild) {
    mySums.removeChild(mySums.firstChild);
  }

  // Reset semua variabel game
  botASCards = 0;
  myASCards = 0;
  isCanHit = true;
  resultElement.textContent = '';

  // Kembali mengaktifkan tombol start game
  startGameButton.disabled = false;
  startGameButton.textContent = 'Mulai Game';

  // Bersihkan nilai input uang
  inputMoney.value = '';

  // Kembali mengatur ulang tumpukan kartu
  buildUserCards();
  shuffleCards();

  // Tampilkan kartu belakang bot
  let hiddenCard = document.createElement('img');
  hiddenCard.src = '/images/cards/BACK.png';
  hiddenCard.className = 'hidden-card';
  botCards.appendChild(hiddenCard);

  // Tampilkan kartu belakang mycard
  let hiddenCard1 = document.createElement('img');
  hiddenCard1.src = '/images/cards/BACK.png';
  hiddenCard1.className = 'hidden-card';
  myCards.appendChild(hiddenCard1);

  // Menonaktifkan tombol take card dan hold cards
  takeCardButton.disabled = true;
  holdCardsButton.disabled = true;
});

function getValueOfCard(card) {
  let cardDetail = card.split("-"); // memisahkan string card menjadi dua bagian, yaitu nilai kartu dan tipe kartu
  let value = cardDetail[0]; // menampung nilai kartu dari elemen pertama array cardDetail

  if (isNaN(value)) { // memeriksa apakah value adalah nilai numerik atau bukan
    // Kartu AS
    if (value == "A") return 11;
    // Kartu K, Q, J
    else return 10; 
  }

  return parseInt(value); // mengonversi value dari string ke integer menggunakan parseInt() dan mengembalikannya
}

function checkASCard(card) { // memeriksa apakah kartu yang diberikan adalah kartu As atau bukan
  if (card[0] == "A") return 1; // memeriksa apakah karakter pertama dari string card adalah "A", yang menunjukkan kartu As. Jika ya, fungsi mengembalikan nilai 1
  else return 0; // kalo bukan, mengembalikan nilai 0
}

function reduceASCardValue(sums, asCards) { // mengurangkan nilai kartu As dari total nilai kartu jika total nilai kartu melebihi 21
  while (sums > 21 && asCards > 0) { // sums lebih besar dari 21, menandakan bahwa pemain atau dealer telah melebihi batas 21. asCards lebih dari 0, menandakan bahwa masih ada kartu Ace yang dapat diubah nilainya
    sums -= 10; // nilai 10 dikurangkan dari total nilai kartu, agar total nilai kartu tetap di bawah atau sama dengan 21
    asCards -= 1; // Jumlah kartu AS dikurangi satu, menandakan bahwa satu kartu AS telah digunakan untuk mengubah nilai
  }
  return sums;
}