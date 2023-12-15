const numberStr = prompt("Masukkan Text : ") 
const NumArray = numberStr.split(''); 

if (NumArray.length == 1) {  //
    console.log(`${numberStr} adalah Text palindrome`);
} else { 
    const reversedNumArray = NumArray.reverse(); //rrserve untuk menukar 
    const reversedNumberStr = reversedNumArray.join('');

    if (numberStr == reversedNumberStr) { //membandingkan 
        console.log(`${numberStr} adalah Text palindrome`); 
    } else {
        console.log(`${numberStr} bukan Text palindrome`);
    }
}