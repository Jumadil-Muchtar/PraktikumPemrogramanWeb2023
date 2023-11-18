function isPalindrome(word) {
   // mengganti semua spasi dalam word menjadi string kosong lalu diubah menjadi lowercase
   // /\s/ -> mencocokkan setiap karakter whitespace
   // g -> flag yg menandakan pencarian harus dilakukan secara global, jgn yg pertama doang
   word = word.replace(/\s/g, "").toLowerCase();

   // loop untuk membandingkan setiap karakter di awal kata dengan karakter di akhir kata
   // loop berjalan setengah dari panjang kata, karena setiap karakter di awal akan dibandingkan dengan karakter di akhir
   for (let i = 0; i < word.length / 2; i++) {
      if (word[i] !== word[word.length - 1 - i]) {
         return false;
      }
   }  
   return true;
}

// hanya mengembalikan nilai true/false
console.log(isPalindrome("KaSur RusAk"));

let kata = "malam";
if (isPalindrome(kata)) {
   console.log(kata + " adalah palindrom.");
   } else {
   console.log(kata + " bukan palindrom.");
}

/*
cth: word = KaSur RusAk -> kasurrusak
perulangan akan berjalan sebanyak panjang kata/2 = 5
jika word[0] !== word[9] -> return false,
jika benar maka perulangan akan berjalan sampai word[4]
*/