const alphabet = "abcdefghijklmnopqrstuvwxyz"
const arrAlphabet = alphabet.split("")
let stringKosong = ""
let text = "Indonesia"
let pisahText = text.toLowerCase().split("")
let n = 13
let sementara = 0
let putaran = 0
for (let i = 0; i < text.length; i++) {
    let batasUjung = arrAlphabet.indexOf(pisahText[sementara]) + n
    if (batasUjung > 25) {
        let hitungPutaran = parseInt((arrAlphabet.indexOf(pisahText[sementara]) + n) / 26)
        putaran = hitungPutaran
        let hasilPutaran = 26 * putaran
        let hasil = arrAlphabet.indexOf(pisahText[sementara]) + n - hasilPutaran
        stringKosong += arrAlphabet[hasil]
        sementara += 1

    } else {
        let indexHuruf = arrAlphabet.indexOf(pisahText[sementara])
        stringKosong += arrAlphabet[indexHuruf + n]
        sementara += 1
    }
}

if(text.charAt(0) === text.charAt(0).toUpperCase()){
    console.log(stringKosong.charAt(0).toUpperCase()+ stringKosong.substring(1))
}else{
    console.log(stringKosong)
}
