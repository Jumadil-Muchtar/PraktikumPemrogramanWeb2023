let listKartu = [
    { nilai: 2, src: "assets/2angkawajik.jpg" },
    { nilai: 2, src: "assets/2angkakeriting.jpg" },
    { nilai: 2, src: "assets/2angkahati.jpg" },
    { nilai: 2, src: "assets/2angkasekop.jpg" },
    { nilai: 3, src: "assets/angka3wajik.jpg" },
    { nilai: 3, src: "assets/angka3keriting.jpg" },
    { nilai: 3, src: "assets/angka3hati.jpg" },
    { nilai: 3, src: "assets/angka3sekop.jpg" },
    { nilai: 4, src: "assets/angka4wajik.jpg" },
    { nilai: 4, src: "assets/angka4keriting.jpg" },
    { nilai: 4, src: "assets/angka4hati.jpg" },
    { nilai: 4, src: "assets/angka4sekop.jpg" },
    { nilai: 5, src: "assets/angka5wajik.jpg" },
    { nilai: 5, src: "assets/angka5keriting.jpg" },
    { nilai: 5, src: "assets/angka5hati.jpg" },
    { nilai: 5, src: "assets/angka5sekop.jpg" },
    { nilai: 6, src: "assets/angka6wajik.jpg" },
    { nilai: 6, src: "assets/angka6keriting.jpg" },
    { nilai: 6, src: "assets/angka6hati.jpg" },
    { nilai: 6, src: "assets/angka6sekop.jpg" },
    { nilai: 7, src: "assets/angka7wajik.jpg" },
    { nilai: 7, src: "assets/angka7keriting.jpg" },
    { nilai: 7, src: "assets/angka7hati.jpg" },
    { nilai: 7, src: "assets/angka7sekop.jpg" },
    { nilai: 8, src: "assets/angka8wajik.jpg" },
    { nilai: 8, src: "assets/angka8keriting.jpg" },
    { nilai: 8, src: "assets/angka8hati.jpg" },
    { nilai: 8, src: "assets/angka8sekop.jpg" },
    { nilai: 9, src: "assets/angka9wajik.jpg" },
    { nilai: 9, src: "assets/angka9keriting.jpg" },
    { nilai: 9, src: "assets/angka9hati.jpg" },
    { nilai: 9, src: "assets/angka9sekop.jpg" },
    { nilai: 10, src: "assets/angka10wajik.jpg" },
    { nilai: 10, src: "assets/angka10keriting.jpg" },
    { nilai: 10, src: "assets/angka10hati.jpg" },
    { nilai: 10, src: "assets/angka10sekop.jpg" }, // 2angkawajik
    { nilai: 10, src: "assets/jackwajik.jpg" },
    { nilai: 10, src: "assets/jackkeriting.jpg" },
    { nilai: 10, src: "assets/jackhati.jpg" },
    { nilai: 10, src: "assets/jacksekop.jpg" },
    { nilai: 10, src: "assets/queenwajik.jpg" },
    { nilai: 10, src: "assets/queenkeriting.jpg" },
    { nilai: 10, src: "assets/queenhati.jpg" },
    { nilai: 10, src: "assets/queensekop.jpg" },
    { nilai: 10, src: "assets/kingwajik.jpg" },
    { nilai: 10, src: "assets/kingkeriting.jpg" },
    { nilai: 10, src: "assets/kinghati.jpg" },
    { nilai: 10, src: "assets/kingsekop.jpg" },
    { nilai: "special", src: "assets/aswajik.jpg" },
    { nilai: "special", src: "assets/askeriting.jpg" },
    { nilai: "special", src: "assets/ashati.jpg" },
    { nilai: "special", src: "assets/assekop.jpg" }
]
// const buttonStart = document.getElementById("buttonStart");
let buttonStart = document.getElementById("mulaiButton")
let buttontambahKartu = document.getElementById("ambilKartuButton")
let buttonHold = document.getElementById("holdKartuButton")

// mematikan tombol buttontambahKartu dan 3
buttontambahKartu.disabled = true
buttonHold.disabled = true
// atribut game
let uangAnda = 5000
let cekKesamaan = []
let sumNilaiSendiri = 0;
let sumNilaiAi = 0;
let persiapan = false
let tryAgain = false
let angkaRandom;


startGame()
function startGame() {
    buttonStart.addEventListener("click", function () {
        //persiapan = false agar user wajib menginput uang taruhan
        persiapan = false
        let uangTaruhan = parseInt(document.getElementById("inputUang").value)
        if (tryAgain == true) {
            buttonStart.disabled = false
            tryAgain = false
            buttonStart.innerHTML = "START GAME"
            // Menghapus semua nilai di dalam array cekKesamaan 
            cekKesamaan.length = 0
            let resetuangTaruhan = document.getElementById("inputUang")
            resetuangTaruhan.value = ""
            const uangPermanen = document.getElementById("inputUang");
            uangPermanen.readOnly = false;
            resetSum()
            hapusGambar()
            hapusTextResult()
            hapusGambarSendiri()

            startGame()
        }
        cekTaruhan(uangTaruhan)
        if (persiapan == true) {
            for (let i = 0; i < 2; i++) {
                do {
                    angkaRandom = Math.floor(Math.random() * 52);
                    if (i == 1 && angkaRandom > 32) {
                        angkaRandom = Math.floor(Math.random() * 10);
                    }
                } while (cekKesamaan.includes(angkaRandom));

                cekKesamaan.push(angkaRandom);
                tampilkanInformasiKartuSendiri(listKartu, angkaRandom);
                tampilkanNilaiKartuSendiri(listKartu, angkaRandom);
                const sumKartu = document.getElementById("jumlahKartuSendiri")
                sumKartu.textContent = `Your Cards : ${sumNilaiSendiri}`
                // input tdk bisa diubah
                const uangPermanen = document.getElementById("inputUang");
                uangPermanen.readOnly = true;
            }
        }

    })

}


buttontambahKartu.addEventListener("click", function () {
    let angkaRandom;
    do {
        angkaRandom = Math.floor(Math.random() * 52);
    } while (cekKesamaan.includes(angkaRandom));

    cekKesamaan.push(angkaRandom);
    tampilkanInformasiKartuSendiri(listKartu, angkaRandom);
    tampilkanNilaiKartuSendiri(listKartu, angkaRandom);
    const sumKartu = document.getElementById("jumlahKartuSendiri")
    sumKartu.textContent = `Your Cards : ${sumNilaiSendiri}`
    if (sumNilaiSendiri > 21) {
        buttontambahKartu.disabled = true
        buttonHold.disabled = true
        hold()
    }
})


buttonHold.addEventListener("click", function () {
    hold()

})
function hold(){
    buttonHold.disabled = true
    buttontambahKartu.disabled = true
    let angkaRandom;
    for (let i = 0; i < 2; i++) {
        do {
            angkaRandom = Math.floor(Math.random() * 52);
        } while (cekKesamaan.includes(angkaRandom));

        cekKesamaan.push(angkaRandom);
        tampilkanInformasiKartuLawan(listKartu, angkaRandom);
        tampilkanNilaiKartuLawan(listKartu, angkaRandom);
        const sumKartu = document.getElementById("jumlahKartuLawan")
        sumKartu.textContent = `Ai Cards : ${sumNilaiAi}`
    }
    // Ai dibuat sedikit pintar (level medium)
    
    if (sumNilaiAi < 17) {
        angkaRandom = Math.floor(Math.random() * 52);
        tampilkanInformasiKartuLawan(listKartu, angkaRandom);
        tampilkanNilaiKartuLawan(listKartu, angkaRandom);
        const sumKartu = document.getElementById("jumlahKartuLawan")
        sumKartu.textContent = `Ai Cards : ${sumNilaiAi}`
        if (sumNilaiAi <= 17) {
            angkaRandom = Math.floor(Math.random() * 52);
            tampilkanInformasiKartuLawan(listKartu, angkaRandom);
            tampilkanNilaiKartuLawan(listKartu, angkaRandom);
            const sumKartu = document.getElementById("jumlahKartuLawan")
            sumKartu.textContent = `Ai Cards : ${sumNilaiAi}`
        }
    }
    result()
    buttonStart.disabled = false
    buttonStart.innerHTML = "Try Again?"
    tryAgain = true
}
function cekTaruhan(uang) {
    if (isNaN(uang)) {
        alert("Masukan Uang Taruhan")
    }
    else if (uang > uangAnda) {
        alert("Uangmu Kurang")

    }
    else if (uang < 1) {
        alert("Harus Ada Uang Taruhan")
    } else {
        buttontambahKartu.disabled = false
        buttonHold.disabled = false
        uangAnda -= uang
        const textUang = document.getElementById("uangSendiri")
        textUang.textContent = `Your Money : ${uangAnda}`
        buttonStart.disabled = true
        persiapan = true
    }
}

function tampilkanInformasiKartuSendiri(arr, rand) {
    let parentElement = document.getElementById("informasiKartuSendiri")
    let newChildElement = document.createElement("img");

    newChildElement.src = arr[rand].src;
    newChildElement.width = 80
    newChildElement.height = 120
    parentElement.appendChild(newChildElement);

}

function tampilkanInformasiKartuLawan(arrLawna, randLawan) {
    let parentElemen = document.getElementById("informasiKartuLawan")
    let newChildElemen = document.createElement("img")
    newChildElemen.src = arrLawna[randLawan].src
    newChildElemen.width = 80
    newChildElemen.height = 120
    parentElemen.appendChild(newChildElemen)
}
function tampilkanNilaiKartuSendiri(arr, rand) {
    // jumlahkartu
    let getNilaiKartu = arr[rand].nilai
    if (getNilaiKartu == "special") {
        if (sumNilaiSendiri < 11) {
            sumNilaiSendiri += 11
        } else {
            sumNilaiSendiri += 1
        }
    } else {
        sumNilaiSendiri += getNilaiKartu
    }
}

function tampilkanNilaiKartuLawan(arr, rand) {
    // jumlahkartu
    let getNilaiKartuLawan = arr[rand].nilai
    if (getNilaiKartuLawan == "special") {
        if (sumNilaiAi < 11) {
            sumNilaiAi += 11
        } else {
            sumNilaiAi += 1
        }
    } else {
        sumNilaiAi += getNilaiKartuLawan
    }
}
function result() {
    let parentElemen = document.getElementById("informasiKartuSendiri")
    let newChildElemen = document.createElement("p")
    if ((sumNilaiSendiri < 22 && sumNilaiSendiri > sumNilaiAi) || (sumNilaiSendiri < 21 && sumNilaiAi > 21) || (sumNilaiSendiri == 21 && sumNilaiAi < 21)) {
        newChildElemen.textContent = "Selamat, Anda Menang !"
        newChildElemen.style.color = "green"
        const textUang = document.getElementById("uangSendiri")
        let uangTaruhan = parseInt(document.getElementById("inputUang").value)
        uangAnda += uangTaruhan * 2
        textUang.textContent = `Your Money : ${uangAnda}`

    }
    else if ((sumNilaiSendiri > 21 && sumNilaiAi > 21 )|| (sumNilaiSendiri == sumNilaiAi)) {

        newChildElemen.textContent = "Seri"
        newChildElemen.style.color = "grey"
        const textUang = document.getElementById("uangSendiri")
        let uangTaruhan = parseInt(document.getElementById("inputUang").value)
        uangAnda += uangTaruhan
        textUang.textContent = `Your Money : ${uangAnda}`
    }
    else if ((sumNilaiSendiri > 21 && sumNilaiSendiri > sumNilaiAi) || sumNilaiSendiri < 22 && sumNilaiSendiri < sumNilaiAi) {

        newChildElemen.textContent = "Anda Kalah !"
        newChildElemen.style.color = "red"
    }

    newChildElemen.style.fontSize = "20px"
    newChildElemen.style.fontWeight = "bold"
    newChildElemen.style.margin = "10px"
    parentElemen.appendChild(newChildElemen)

}

// function hapusInformasiSendiri
function hapusGambar() {
    let gambarKartuSendiri = document.getElementById("informasiKartuSendiri");
    let gambarKartuLawan = document.getElementById("informasiKartuLawan");

    // Membuat array untuk menyimpan semua elemen gambar yang ditambahkan
    let gambarKartuSendiriElements = gambarKartuSendiri.querySelectorAll("img");
    let gambarKartuLawanElements = gambarKartuLawan.querySelectorAll("img");

    // Menghapus semua elemen gambar dalam elemen "informasiKartuSendiri"
    for (let i = 0; i < gambarKartuSendiriElements.length; i++) {
        gambarKartuSendiri.removeChild(gambarKartuSendiriElements[i]);
    }

    // Menghapus semua elemen gambar dalam elemen "informasiKartuLawan"
    for (let i = 0; i < gambarKartuLawanElements.length; i++) {
        gambarKartuLawan.removeChild(gambarKartuLawanElements[i]);
    }
}

// hapus teks result ketika try again
function resetSum() {
    sumNilaiSendiri = 0;
    sumNilaiAi = 0;
    const sumKartu1 = document.getElementById("jumlahKartuLawan")
    sumKartu1.textContent = `Ai Cards : ${sumNilaiSendiri}`
    const sumKartu2 = document.getElementById("jumlahKartuSendiri")
    sumKartu2.textContent = `Your Cards : ${sumNilaiAi}`
}
function hapusTextResult() {
    let parentElemen = document.getElementById("informasiKartuSendiri")
    let newChildElemen = parentElemen.querySelector("p");

    parentElemen.removeChild(newChildElemen)
}





