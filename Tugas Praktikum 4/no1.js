function hitungPangkat (angka,pangkat) {
    let hasil = angka ** pangkat;
    return hasil; 
}

let angka = parseInt(prompt('Masukkan angka = '))  
let pangkat = parseInt(prompt('Masukkan pangkat = '))

let hasilPangkat = hitungPangkat(angka, pangkat);
console.log(`Hasil ${angka} pangkat ${pangkat} adalah ${hasilPangkat}`);