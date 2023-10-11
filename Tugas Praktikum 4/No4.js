let myArray = []; //Membuat array kosong myArray yang akan berisi angka-angka.
let n = parseInt(prompt("Masukkan jumlah angka: ")); //untuk memasukkan angka

for (let i = 0; i < n; i++) {
    let num = parseInt(prompt("Masukkan angka ke-" + (i+1) + ": "));
    myArray.push(num);
} //Melakukan perulangan sebanyak n kali untuk mengisi myArray

for (let i = 0; i < myArray.length; i++) { // Melakukan perulangan sebanyak panjang array myArray.
    for (let j = 0; j < myArray.length-i-1; j++) { //Melakukan iterasi dalam array untuk membandingkan pasangan angka berdekatan.
        if (myArray[j] > myArray[j+1]) {
            let temp = myArray[j];
            myArray[j] = myArray[j+1];
            //Menegaskan dua angka berdekatan. Jika angka ke-j lebih besar daripada angka ke-j+1, maka keduanya ditukar.
            myArray[j+1] = temp; // temp itu variabel untuk tukar angka
        }
    }
}
alert("Angka yang telah diurutkan: " + myArray.join(" "));