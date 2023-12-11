// nomor 1

function pangkat(a, b) {
  return a ** b

}

let hasilPangkat = pangkat(5 , 3);
console.log(hasilPangkat); 
  
//   nomor 2


function cipherText(input, n) {
  const abjadLowerCase = 'abcdefghijklmnopqrstuvwxyz'.split('');
  const abjadUpperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');

  let hasil = '';

  for (let i = 0; i < input.length; i++) {
      if (/[a-zA-Z]/.test(input[i])) {
          let abjad;
          if (/[a-z]/.test(input[i])) {
              abjad = abjadLowerCase;
          } else {
              abjad = abjadUpperCase;
          }

          const indeks = abjad.indexOf(input[i]);

          const indeksBaru = (indeks + n) % 26;

          hasil += abjad[indeksBaru];
      } else {
          console.log("Terdapat inputan selain huruf");
          break;
      }
  }

  return hasil;
}

let jumlahGeser = 10;
let text = "";
let hasil = cipherText(text, jumlahGeser);
console.log(hasil);

// nomor 3

let isPalindrom;
let stringKosong = "";
let cocokTidak = "";

function palindrom (isPalindrom) {
  let arrPlndrm = isPalindrom.split("");
  cocokTidak += isPalindrom;

  for (let i = 0; i < isPalindrom.length; i++) {
    stringKosong += arrPlndrm [isPalindrom.length - 1 - i]
  }

  return stringKosong;
}

let cek = palindrom("malam");

if (stringKosong == cocokTidak) {
  console.log(cek + " Merupakan Palindrom");
} else {
  console.log("Bukan Palindrom");
}

// nomor 4

let arr = [];

function mengurutkan(n) {
  
  for (let h = 0; h < n; h++) {
    let rand = Math.floor(Math.random() * 100 + 1)
    arr.push(rand)
    
  }

  for (let i = 0; i <  n; i++) {
    for (let j = 0; j < n; j++) {
      if (arr[j] >= arr[j+1]) {
        let simpanAngka = arr[j];
        arr[j] = arr[j+1];
        arr[j+1] = simpanAngka;

      }
    }
    
  }
}

let angka = mengurutkan(10);
console.log(arr)

// nomor 5

let convertnum;

function biner(convertnum) {
  let result = "";

  while (convertnum > 0) {
    result = (convertnum % 2) + result;
    convertnum = Math.floor(convertnum / 2);
  }

  return result;
}

let hasilbiner = biner(12);
console.log(hasilbiner);









