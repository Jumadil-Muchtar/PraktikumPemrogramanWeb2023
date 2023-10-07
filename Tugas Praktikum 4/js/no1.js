let angka = parseInt(prompt("Masukkan Angka : "));
let pangkat = parseInt(prompt("Masukkan Pangkat : "));

if (!isNaN(angka) || !isNaN(pangkat)) {
  let hasil = angka ** pangkat;
  alert(`Hasilnya Adalah ${hasil}`);
} else {
  alert("Input Harus Berupa Angka");
}
