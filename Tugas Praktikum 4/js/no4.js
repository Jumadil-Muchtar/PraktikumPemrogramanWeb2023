function main() {
  const n = prompt("Masukkan jumlah angka: ");
  const angka = [];

  for (let i = 0; i < n; i++) {
    const number = parseInt(prompt(`Masukkan angka ke-${i + 1}: `));
    angka.push(number);
  }

  // Melakukan pengurutan secara manual
  for (let i = 0; i < n - 1; i++) {
    for (let j = 0; j < n - i - 1; j++) {
      if (angka[j] > angka[j + 1]) {
        const temp = angka[j];
        angka[j] = angka[j + 1];
        angka[j + 1] = temp;
      }
    }
  }

  console.log("Angka yang telah diurutkan:");
  console.log(angka.join(" "));
}

main();
