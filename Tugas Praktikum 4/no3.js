function isPalindrome(kata) {
    let tanpaspasi = kata.toLowerCase().replace(/s\g/, '');
    console.log(tanpaspasi, " tanpa spasi");
    let kataterbalik = tanpaspasi.split('').reverse().join('')
    console.log(kataterbalik, " kata terbalik");
    return tanpaspasi == kataterbalik;
}

let kata = "ya ay ya";
if (isPalindrome(kata)) {
    console.log(kata, "adalah kata palindrom.");
} else {
    console.log(kata ,"bukan kata palindrom.");
}

