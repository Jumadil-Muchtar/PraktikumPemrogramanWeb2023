let str = prompt("Input kata: ")
let strs = str.split('') // Mengkonversi str ke array
let newstr = strs.reverse() 
newstr = newstr.join('') // Ubah kembali ke string
if (str == newstr) {
    alert (newstr + " adalah kata polindrom")
} else {
    alert (newstr + " bukan kata polindrom")
}