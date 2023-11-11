function selectionSort(arr) {
  const n = arr.length; // dia simpan panjang array

  for (let i = 0; i < n - 1; i++) { // i dimulai dari 0 , i kurang dari n(panjang array 1)
    let minIndex = i; // ini hasilnya 

    for (let j = i + 1; j < n; j++) { // membandingkan 1 elemen array dengan elemen array lainnya
      if (arr[j] < arr[minIndex]) { // membandingkan
        minIndex = j; // ini hasil perbandingan kalau j ini yang paling kecil
      }
    }

  
    if (minIndex != i) {
      const temp = arr[i]; 
      arr[i] = arr[minIndex];
      arr[minIndex] = temp; // jika terdapat nilai yang kecil maka otomatis akan digeser ke depan 
    }
  }

  

}

const readline = require('readline');
const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

rl.question('Masukkan angka (pisahkan dengan spasi): ', (input) => { // inputan satu baris
  const numbers = input.split(' ').map(Number); // dia pisah dan simpan dalam array kemudian map untuk dia urutkan 
  selectionSort(numbers); // memanggil function
  console.log('Angka yang diurutkan:');
  console.log(numbers.join(' '));// menambahkan kembali spasi
  rl.close(); // tutup inputan
});
