function isPalindrome(word) {
    // Menghapus spasi dan mengubah huruf menjadi huruf kecil
    word = word.toLowerCase();
  
    // Membalik kata
    const reversedWord = word.split("").reverse().join("");
  
    // Memeriksa apakah kata asli sama dengan kata yang dibalik
    return word === reversedWord;
  }
  
  const kata = "orang orang";
  if (isPalindrome(kata)) {
    console.log("'" + kata + "'" + " adalah kata palindrom.");
  } else {
    console.log("'" + kata + "'" + " bukan kata palindrom.");
  }