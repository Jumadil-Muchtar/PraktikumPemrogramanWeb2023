let arrAngka = []
n = 5
let nilaiSementara = 0

for (let i = 0; i < n; i++) {
    let angkaRandom = Math.floor((Math.random() * 100) + 1)
    arrAngka.push(angkaRandom)
}
console.log("sebelum " + arrAngka)
for (let i = 0; i < n-1; i++) {
    for (let j = 0; j < n-1; j++) { 
        console.log(j)
        //43 50 86 72 56
        //43 50 72 86 56
        //43 50 72 56 86
        //43 50 56 72 86
        if (arrAngka[j] >= arrAngka[j + 1]) {
            nilaiSementara = arrAngka[j]
            arrAngka[j] = arrAngka[j + 1]
            arrAngka[j + 1] = nilaiSementara
        }
    }
}
console.log("sesudah " + arrAngka)
