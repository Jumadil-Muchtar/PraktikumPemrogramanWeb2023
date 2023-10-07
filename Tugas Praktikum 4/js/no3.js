let kata = prompt("Masukkan Kata : ");
let kataLowerCase = kata.toLowerCase();
let kataAwal = kataLowerCase.split("");
let kataAkhir = kataAwal.reverse().slice(); // Menggunakan slice() untuk menghindari perubahan array asli

kataAkhir = kataAkhir.join("");

if (kataLowerCase == kataAkhir) {
  alert(`${kata} adalah Palindrom`);
} else {
  alert(`${kata} bukan Palindrom`);
}
