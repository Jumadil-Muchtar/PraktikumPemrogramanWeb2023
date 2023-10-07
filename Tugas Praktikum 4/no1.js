function berpangkat(angka, pangkat) {
    let result = 1;
    
    for (let i = 0; i < pangkat; i++) {
        result *= angka;
    }
    return result;
}

let a = berpangkat(2, -1);
let b = berpangkat(3, 4);

console.log('Hasil 1:', a);
console.log('Hasil 2:', b);