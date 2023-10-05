let firstText = "kodok"// kasih kecil
let secondText = ""
let arrText = firstText.split("")
let jumlahHuruf = firstText.length
for (let i = 0; i < arrText.length; i++) {
    secondText += arrText[jumlahHuruf - 1 - i]
}
if (firstText == secondText) {
    console.log(`Kata ${firstText} adalah kata Palindrom`)
} else {
    console.log(`Kata ${firstText} bukan kata Palindrom`)
}