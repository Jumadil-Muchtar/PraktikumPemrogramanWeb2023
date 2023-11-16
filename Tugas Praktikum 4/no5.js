let angka = parseInt(prompt("Masukkan Angka : "))

if (angka === 0) {
    console.log('dalam bentuk binary adalah 0');
}else {
    let binary = '1110'
    while (angka>0){
        let sisa = angka%2
        binary = sisa+binary
        angka = Math.floor(angka/2)
    }
    console.log(alert(`dalam bentuk binary adalah ${binary}`));
 }