const alphabet = "abcdefghijklmnopqrstuvwxyz"
const arrAlphabet = alphabet.split("")
let stringKosong = ""
let text = "Indonesia Raya"
let pisahText = text.toLowerCase().split("")
let pisahTextAsli = text.split("")
let n = 13
let sementara = 0
let putaran = 0
for (let i = 0; i < text.length; i++) {
    if (arrAlphabet.includes(pisahText[sementara])) {
        let batasUjung = arrAlphabet.indexOf(pisahText[sementara]) + n
        if (batasUjung > 25) {
            let hitungPutaran = parseInt((arrAlphabet.indexOf(pisahText[sementara]) + n) / 26)
            putaran = hitungPutaran
            let hasilPutaran = 26 * putaran
            let hasil = arrAlphabet.indexOf(pisahText[sementara]) + n - hasilPutaran
            if (pisahTextAsli[sementara] === pisahTextAsli[sementara].toUpperCase()) {
                stringKosong += arrAlphabet[hasil].toUpperCase()
            } else {
                stringKosong += arrAlphabet[hasil]
            }
            sementara += 1

        } else {
            let indexHuruf = arrAlphabet.indexOf(pisahText[sementara])
            if (pisahTextAsli[sementara] === pisahTextAsli[sementara].toUpperCase()) {
                stringKosong += arrAlphabet[indexHuruf + n].toUpperCase()
            } else {
                stringKosong += arrAlphabet[indexHuruf + n]
            }
            sementara += 1
        }
        
    } else {
        if(pisahText[sementara] == " "){
            stringKosong += " "
        }
        sementara += 1
    }
}

console.log(stringKosong)

