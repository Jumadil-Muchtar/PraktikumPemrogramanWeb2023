function caesarCipher(text, shift) {
   let encryptedText = "";

   for (let i = 0; i < text.length; i++) {
      let char = text[i];
      let charCode = char.charCodeAt();

      // konversi huruf kecil
      if (char >= "a" && char <= "z") {
         charCode = ((charCode - 97 + shift) % 26) + 97;
      // konversi huruf besar
      } else if (char >= "A" && char <= "Z") {
         charCode = ((charCode - 65 + shift) % 26) + 65;
      } else {
         console.log("error");
      }

      encryptedText += String.fromCharCode(charCode);
   }
   return encryptedText;
}

console.log(caesarCipher("abc", 1));

/* rumus caesar cipher
Enkripsi: ciphertext[i] = (plaintext[i] + shift) modulo 26
Di mana ciphertext[i] adalah huruf ke-i dalam ciphertext, plaintext[i] 
adalah huruf ke-i dalam plaintext, dan shift adalah jumlah pergeseran. */

/*
text = abc
text[0] -> char = a 
char = a -> charcode = 97
if char = a
   charcode = ((97-97 + 1) % 26) + 97 = 98
charcode = 98 -> enryptedtext = b
*/