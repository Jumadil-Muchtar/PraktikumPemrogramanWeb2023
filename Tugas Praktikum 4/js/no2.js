let kata = prompt("Masukkan kata: ");
let n = parseInt(prompt("Masukkan nilai shift: "));

if (Number.isNaN(n)) {
  alert("Nilai n harus berupa angka");
} else {
  let final = [];

  for (let i = 0; i < kata.length; i++) {
    let charcode = kata[i].charCodeAt(0);

    if (
      (charcode >= 65 && charcode <= 90) ||
      (charcode >= 97 && charcode <= 122)
    ) {
      let code = charcode + n;

      if (
        (charcode >= 65 && charcode <= 90 && code > 90) ||
        (charcode >= 97 && charcode <= 122 && code > 122)
      ) {
        code -= 26;
      }

      let shifted_char = String.fromCharCode(code);
      final.push(shifted_char);
    } else {
      alert("Masukkan string yang valid");
      break;
    }
  }

  if (final.length > 0) {
    final = final.join("");
    alert(`Jadi Kata ${kata} Jika Di Shift Sebanyak ${n} Kali = ${final}`);
  }
}
