function encrypt(text, shift) {
    let result = '';

    for (let i = 0; i < text.length; i++) {
        let char = text.charAt(i);

        if (char.match(/[a-zA-Z]/)) {
            let code = text.charCodeAt(i);

            if (char == char.toLowerCase()) {
                char = String.fromCharCode(((code - 97 + shift) % 26) + 97);
            } else {
                char = String.fromCharCode(((code - 65 + shift) % 26) + 65);
            }
        }
        result += char;
    }
    return result;
}

let plaintext = 'Indonesia';
let shiftAmount = 1;
let ciphertext = encrypt(plaintext, shiftAmount);

console.log("Plaintext:", plaintext);
console.log("Ciphertext:", ciphertext);
