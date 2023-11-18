function decimalToBinary(decimal) {
   let binary = "";
   while (decimal > 0) {
      binary = (decimal % 2) + binary;
      decimal = Math.floor(decimal / 2);
   }
   return binary;
}

const decimalNum = 14
const binaryNum = decimalToBinary(decimalNum)
console.log("Angka binary dari", decimalNum, "adalah", binaryNum);

/*
didefinisikan variabel binary yg berupa string kosong
dilakukan perulangan while dengan kondisi decimal > 0,
maka nilai dri decimal % 2 lalu dimasukkan ke variabel binary di paling kanan
nilai dri decimal / 2 dan hasil baginya dibulatkan ke bawah,
line 4 5 akan terus berjalan selama nilai decimal > 0
*/