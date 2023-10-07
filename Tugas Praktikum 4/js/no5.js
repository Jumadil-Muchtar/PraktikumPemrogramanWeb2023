let angka = parseInt(prompt("Masukkan Angka : "));

if (!isNaN(angka)) {
  let binary = angka.toString(2);
  alert(`Binary Dari Angka ${angka} Adalah ${binary}`);
} else {
  alert(`Input Harus Berupa Angka`);
}
