// Masukkan angka desimal di sini
let inputDecimal = 14.2; // Gantilah dengan angka desimal yang diinginkan

// Mengubah input menjadi angka desimal
let decimalNumber = parseInt(inputDecimal);

// Memanggil fungsi dan mencetak hasil\

let binaryNumber = decimalToBinary(decimalNumber);
console.log("Bilangan biner dari", decimalNumber, "adalah" , binaryNumber);

// Fungsi untuk mengubah nilai desimal menjadi nilai binary dengan 1 parameter yaitu decimal number
function decimalToBinary(decimalNumber) {
    // fungsi dari baris di bawah ini adalah decimal number di shift ke arah kana sebanyak 0 bit, yang bertujuan untuk memastikan bahwa nilai dari decimal Number bertanda positif
    // maksud dari toString(2) disini adalah untuk mengonversi bilangan hasil dari langkah pertama ke dalam bentuk string dengan basis 2 (biner)
    return (decimalNumber >>> 0).toString(2);
}
