function numberToBinary(angka) {
  if (angka === 0) {
    return "0";
  }

  let binary = "";
  while (angka > 0) {
    // Ambil sisa dari pembagian dengan 2
    binary = (angka % 2) + binary;
    // Bagi angka angka dengan 2
    angka = Math.floor(angka / 2);
  }

  return binary;
}

function main() {
  const angka1 = parseInt(prompt("Masukkan angka yang akan dikonversi : "));

  if (isNaN(angka1)) {
    console.log("Input Hanya Berupa Angka");
  } else {
    const angkaBinary = numberToBinary(angka1);
    console.log(`Angka biner dari ${angka1} adalah : ${angkaBinary}`);
  }
}

main();
