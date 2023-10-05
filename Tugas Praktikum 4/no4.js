let numbers = [] 

const n = parseInt(prompt("Masukkan nilai n : "))  
for (let i = 0; i < n; i++) {
    let number = parseInt(prompt(`Masukkan angka ke ${i} :`)) 
    numbers.push(number); //pop klo mau di hapus 
}

const panjang = numbers.length //Ini untuk hitung panjang array numbers 
let tukar; 

do {
    tukar = false; 
    for (let i = 0; i < panjang - 1 ; i++) {
        if (numbers[i]>numbers[i+1]) { 
        let balik = numbers[i] 
        numbers[i] = numbers[i+1] 
        numbers[i+1] = balik 
        tukar = true //ketika true, maka penukaran diulang terus sampai batasannya
        }
    }
} while (tukar); 

console.log(numbers.join(', '));

