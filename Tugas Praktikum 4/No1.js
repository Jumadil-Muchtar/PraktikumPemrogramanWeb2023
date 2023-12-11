function pangkat(angka, pangkat) {
    let hasil = 1; // Mendeklarasikan variabel
  
    for (let i = 0; i < pangkat; i++) { // Looping
      hasil *= angka; // Setiap iterasi loop, nilai hasil dikalikan dengan angka
    }
  
    return hasil; 
}
  
const angka1 = parseInt(prompt("Masukkan angka pertama:")); // Inputan
const angka2 = parseInt(prompt("Masukkan pangkat:"));
  
if (!isNaN(angka1) && !isNaN(angka2)) { // Memeriksa yang diinput apakah angka atau bukan // isNan : mengembalikan nilai true
    const hasilPangkat = pangkat(angka1, angka2); 
    alert(angka1 + " dan " + angka2 + " akan menghasilkan nilai " + hasilPangkat); 
} else {
    alert("Inputan tidak valid. Tolong masukkan angka");
}