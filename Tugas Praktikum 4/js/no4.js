function main() {
  const n = parseInt(prompt("Masukkan jumlah angka: "));
  const angka = [];

  if (!isNaN(n)) {
    for (let i = 0; i < n; i++) {
      const number = parseInt(prompt(`Masukkan angka ke-${i + 1}: `));
      angka.push(number);
    }

    // Melakukan pengurutan menggunakan Bubble Sort
    for (let i = 0; i < angka.length - 1; i++) {
      for (let j = 0; j < angka.length - i - 1; j++) {
        if (angka[j] > angka[j + 1]) {
          // Tukar angka[j] dan angka[j+1]
          const temp = angka[j];
          angka[j] = angka[j + 1];
          angka[j + 1] = temp;
        }
      }
    }

    const sortedAngka = "Angka yang telah diurutkan :\n" + angka.join(" ");
    alert(sortedAngka);
  } else {
    alert("Jumlah Angka Harus Berupa Integer");
  }
}

main();
