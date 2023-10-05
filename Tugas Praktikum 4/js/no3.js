function pallindromCheck(kata) {
  // Delete spasi dan mengubah semua word to lowercase agar tidak mempengaruhi program saat membandingkan
  const kataAwal = kata.toLowerCase().replace(/ /g, "");
  // Reverse Kata
  const kataDibalik = kataAwal.split("").reverse().join("");
  // Memeriksa Apakah Katanya Pallindrom or No
  return kataAwal === kataDibalik;
}

function main() {
  // Penggunaan Versi Prompt
  // const kata1 = prompt("Masukkan Kata / Angka Yang Akan Dibuktikan :");
  // console.log(pallindromCheck(kata1)); // true or false

  // Penggunaan Versi Memiliki Nilai Langsung
  const kata2 = "MALAM";
  console.log(pallindromCheck(kata2)); // true or false
}

main();
