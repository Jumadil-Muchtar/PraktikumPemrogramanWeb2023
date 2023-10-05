function pangkat(angka, pangkat) {
  let hasil = 1;
  for (let i = 1; i <= pangkat; i++) {
    hasil *= angka;
  }
  return hasil;
}

const angkaInput = prompt("Masukkan Angka : ");
const pangkatInput = prompt("Masukkan Pangkat : ");

// Memeriksa apakah input adalah angka yang valid
if (!isNaN(angkaInput) && !isNaN(pangkatInput)) {
  const angka1 = parseFloat(angkaInput);
  const pangkat1 = parseInt(pangkatInput);
  const hasil = pangkat(angka1, pangkat1);
  console.log(`${angka1} Pangkat ${pangkat1} = ${hasil}`);
} else {
  console.log("Masukan tidak valid. Harap masukkan angka yang valid.");
}
