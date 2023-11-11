function decimalToBinary(decimal) {
    if (decimal == 0) {
      return '0';
    }
  
    let binary = ''; // tempat simpan hasil
    while (decimal > 0) {
      const remainder = decimal % 2;
      binary = remainder + binary;
      decimal = Math.floor(decimal / 2);
    }
  
    return binary;
  }
  
  const readline = require('readline');
  const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
  });

  rl.question('Masukkan angka desimal: ', (decimal) => {
    const binary = decimalToBinary(parseInt(decimal));
    console.log(`Angka biner: ${binary}`);
    rl.close();
  });
  