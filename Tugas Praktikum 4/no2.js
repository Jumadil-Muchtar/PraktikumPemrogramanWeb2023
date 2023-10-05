let kata = prompt("Masukkan Kata : "); 
let n = parseInt(prompt("Masukkan angka : "));  
const hurufAZ = "abcdefghijklmnopqrstuvwxyz"; 

let hasil = "";

for (let i = 0; i < kata.length; i++) {  
    let karakter = kata[i]; 

    if (/[a-zA-Z]/.test(karakter)) { 
        let hurufIndeks = hurufAZ.indexOf(karakter.toLowerCase());  
            let geserIndeks = (hurufIndeks + n) % 26; 
            if (geserIndeks < 0) { 
                geserIndeks += 26;
            }
            let hurufGeser = hurufAZ[geserIndeks]; 

            if (karakter === karakter.toUpperCase()) { 
                hurufGeser = hurufGeser.toUpperCase(); 
            } else if (karakter === karakter.toLowerCase()) { 
                hurufGeser = hurufGeser.toLowerCase(); 
            }


            karakter = hurufGeser; 
        
    }

    hasil += karakter; 
}
console.log(hasil);