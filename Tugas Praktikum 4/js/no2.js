function cipherText(text, shift) {
  let result = "";

  for (let i = 0; i < text.length; i++) {
    let char = text[i];

    // Periksa apakah karakter adalah huruf alfabet
    if (/[a-zA-Z]/.test(char)) {
      const upperCase = char === char.toUpperCase();
      const offset = upperCase ? "A".charCodeAt(0) : "a".charCodeAt(0);
      const charCode = char.charCodeAt(0);
      const shiftedCharCode = ((((charCode - offset + shift) % 26) + 26) % 26) + offset;
      const shiftedChar = String.fromCharCode(shiftedCharCode);

      result += upperCase ? shiftedChar : shiftedChar.toLowerCase();
    } else {
      alert("Masukkan Teks Yang Hanya Berupa Angka");
    }
  }

  return result;
}

// Contoh penggunaan paki prompt
// const teks = prompt("Masukkan Teks : ");
// const shift = parseInt(prompt("Masukkan Shift : "));
// const encryptedText = cipherText(teks, shiftInt);
// console.log(`Plaintext: ${teks}`);
// console.log(`Shift: ${shift}`);
// console.log(`Ciphertext: ${encryptedText}`);

// Contoh penggunaan memiliki nilai langsung
const teks = "Indonesia";
const shift = 13;
const encryptedText = cipherText(teks, shift);
console.log(`Plaintext: ${teks}`);
console.log(`Shift: ${shift}`);
console.log(`Ciphertext: ${encryptedText}`);
