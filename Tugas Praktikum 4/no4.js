let list = prompt("Masukkan angka dengan pemisah spasi")
        .split(" ")
        .map((str) => parseInt(str)); 
        console.log(list);

      for (let i in list) {
        for (let j = 0; j < list.length - i - 1; j++) { //untuk membandingkan dan menukar elemen-elemen yang tidak terurut.
          if (list[j] > list[j + 1]) {
            let temporary = list[j];
            list[j] = list[j + 1];
            list[j + 1] = temporary;
          }
        }
      }
        
      alert(list.join(" "));