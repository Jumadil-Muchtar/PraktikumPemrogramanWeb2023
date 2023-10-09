function pangkat(angka, pangkat) {
   let hasil = 1;
   if (pangkat > 0) {
      for (let i = 1; i <= pangkat; i++) {
         hasil *= angka;
      }
   } else if (pangkat < 0) {
      for (let i = 1; i <= Math.abs(pangkat); i++) {
         hasil /= angka;
      }
   } 
   return hasil;
}
 
console.log(pangkat(3, 4));
console.log(pangkat(2, -2));
console.log(pangkat(2, 0));

/*
fungsi bernama pangkat memiliki parameter angka dan pangkat
didefinisikan variabel hasil yg nilai awalnya 1
perulangan yg akan diulang sebanyak 'pangkat' kali
nilai awal 'hasil' akan dikali 'angka', hasilnya akan dikali lgi dgn 'angka' sebanyak 'pangkat' kali
setelah perulangan selesai, akan dikembalikan nilai 'hasil' */