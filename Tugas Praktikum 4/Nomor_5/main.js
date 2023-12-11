let angkaRandom = Math.floor((Math.random() * 100) + 1) //10
console.log(angkaRandom)
let array = []
let simpanAngkaRandom = 0
while (simpanAngkaRandom != 1) {
    let hasilPembagian = (angkaRandom / 2)
    console.log(hasilPembagian)
    // Mengetahui sisa 1 atau 0
    if (Number.isInteger(hasilPembagian)) {
        array.unshift(0)
    } else {
        array.unshift(1)
    }
    simpanAngkaRandom = parseInt(hasilPembagian)
    angkaRandom = simpanAngkaRandom

}
array.unshift(1)
console.log(array)

