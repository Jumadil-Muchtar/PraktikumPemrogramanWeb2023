// function caesarCipherEncrypt(text, shift) {
//     let result = ''; // Menyimpan hasil enkripsi
  
//     for (let i = 0; i < text.length; i++) { // Looping 
//       let char = text[i]; // Menyimpan char dalam iterasi
  
//         if (/[a-zA-Z]/.test(char)) { // Periksa apakah karakter adalah huruf
//             let isUpperCase = char === char.toUpperCase(); // mengidentifikasi apakah karakter char adalah huruf kapital
//             let baseCharCode = isUpperCase ? 'A'.charCodeAt(0) : 'a'.charCodeAt(0); // menentukan kode karakter dasar
//             let charCode = char.charCodeAt(0); // mengonversi karakter char ke kode ASCII 
//             let encryptedCharCode = ((charCode - baseCharCode + shift) % 26) + baseCharCode; // rumus mengenkripsi karakter
  
//             result += String.fromCharCode(encryptedCharCode);
//         } else {
//             // Jika bukan huruf, biarkan karakter tersebut tidak berubah
//             result += char;
//         }
//     }
  
//     return result;
//     }
  
// const plaintext = prompt("Masukkan kata: ");
// const shift = parseInt(prompt("Digeser sebanyak: "))
// const encryptedText = caesarCipherEncrypt(plaintext, shift);
  
// alert("Teks Asli: " + plaintext);
// alert("Teks Terenkripsi: " + encryptedText);



// let kata = prompt("Masukkan kata: ")
// let n = parseInt(prompt("Masukkan nilai n: "))

// let final = []
// for (let i=0; i<kata.length; i++){
//     if(Number.isNaN(n)){
//         alert("Nilai n harus berupa angka")
//         break
//     }
//     let charcode = kata[i].charCodeAt(0)
//     if(charcode < 65){
//         alert("Masukkan string: ")
//         break
//     }
//     else if(charcode > 122){
//         alert("Masukkan string: ")
//         break
//     }
//     else if(charcode > 90 && charcode < 97){
//         alert("Masukkan string: ")
//         break
//     }
//     let code = charcode += n
//     if(code > 122){
//         code -= 26
//     }
//     else if(code > 90 && code < 97){
//         code -= 26
//     }
//     let shifted_char = String.fromCharCode(code)
//     final.push(shifted_char)
// }

// final = final.join("")
// alert(final)


let kata = prompt("Masukkan kata: ")
let n = parseInt(prompt("Masukkan nilai geser: "))

if (Number.isNaN(n)) {
    alert("Nilai n harus berupa angka!")
} else {
    let final = []

    for (let i = 0; i < kata.length; i++) {
        console.log("perulangan ke "+i);
        let charcode = kata[i].charCodeAt(0)

        if ((charcode >= 65 && charcode <= 90) || (charcode >= 97 && charcode <= 122)) {
            let code = charcode + n

            if ((charcode >= 65 && charcode <= 90 && code > 90) || (charcode >= 97 && charcode <= 122 && code > 122)) {
                code -= 26
            }

            let shifted_char = String.fromCharCode(code)
            final.push(shifted_char)
        } else {
            alert("Masukkan string yang valid")
            break 
        }
    }

    if (final.length > 0) {
        final = final.join("")
        alert(`Jadi Kata ${kata} Jika Digeser Sebanyak ${n} Kali = ${final}`)
    }
}