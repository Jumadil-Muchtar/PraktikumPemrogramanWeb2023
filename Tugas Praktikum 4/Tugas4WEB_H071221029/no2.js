// Cipher text encrypt adalah dimana sebuah text digeser sebanyak n kali seperti abc dengan n=1 maka akan menghasilkan bcd atau Indonesia dengan n=13 maka akan menghasilkan Vaqbarfvn. Buatlah sebuah program cipher text di javascript

// let abjad = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"]

function caesarCipher(text, shift) {
  let result = ''; // simpan hasil  

  for (let i = 0; i < text.length; i++) {
    let char = text[i]; 


    if (char.match(/[a-zA-Z]/)) { // dia cek apakah tidak ada simbol lain 
      const isUpperCase = char === char.toUpperCase(); // perbandingan antara char sama char yang sudah dihurufbesarkan

      let charCode = char.charCodeAt(0); // codeasciiaq // 
      console.log("char "+charCode)
      charCode = ((charCode - (isUpperCase ? 65 : 97) + shift) % 26) + (isUpperCase ? 65 : 97); // charcode dimulai dari 0, kemudian ada ternary yang mengecek apakah dia memakai huruf kecil/besar sesuai kode ASCII. ada % 26 untuk menjadikan perpuataran huruf hanya dalam lingkup jumlah aplhabet
      charCode = 98,99,

      result += String.fromCharCode(charCode); // mengubah code asci jadi string
    } else {
      result += char;
    }
  }

  return result;
}

// Contoh penggunaan
const prompt=require("prompt-sync")({sigint:true});

const plaintext = prompt("Masukkan kata : ")
const shift = parseInt(prompt("Masukkan shift : "))

const ciphertext = caesarCipher(plaintext, shift);

console.log(`Ciphertext: ${ciphertext}`);

