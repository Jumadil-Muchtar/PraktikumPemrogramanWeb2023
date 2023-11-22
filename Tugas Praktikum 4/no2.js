function penggesaranKarakter(text, pergesaran) {
    let hurufKecil = "abcdefghijklmnopqrstuvwxyz";
    let hurufBesar = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    let hasil = "";
  
    for (let i = 0; i < text.length; i++) {
        if (text[i] === " ") {
            hasil = hasil + " "; //Memeriksa apakah karakter saat ini adalah spasi. Jika ya, spasi tersebut tetap dipertahankan dalam hasil.
        } else {
            let karakter = text[i];
            let isHurufBesar = hurufBesar.includes(karakter);
            // Memeriksa apakah karakter adalah huruf besar dengan menggunakan metode .includes(). Variabel isHurufBesar akan menjadi true jika karakter adalah huruf besar, dan false jika tidak.
            let hurufSet = isHurufBesar ? hurufBesar : hurufKecil;
            // Memilih set alfabet yang sesuai (hurufBesar atau hurufKecil) berdasarkan nilai dari isHurufBesar.
            let indexKarakter = hurufSet.indexOf(karakter);
            hasil = hasil + hurufSet[(indexKarakter + pergesaran) % hurufSet.length];
        }
    }
    return hasil;
  }
  
  let textinput = prompt("Masukkan teks yang ingin diinput: ");
  let pergesaran = parseInt(prompt("Masukkan angka pergeseran: "));
  
  let hasilpergesaran = penggesaranKarakter(textinput, pergesaran);
  alert(hasilpergesaran);
  