<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<form method="get" action="main.php">
        <label for="jenisBarang">Pilih Tipe Barang:</label>
        <select id="jenisBarang" name="jenisBarang">
            <option >Pilihan Tipe</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Pakaian">Pakaian</option>
            <option value="Buah">Buah</option>
        </select>
        <!-- <input type="text" id="jenisBarang" name="jenisBarang" placeholder = "Masukkan Tipe"> -->
        <button type="submit">Kirim</button>
</form>
    
    <?php
    $datas = [
        [
            "nama_barang" => "HP",
            "harga" => 3000000,
            "stok" => 10,
            "jenis" => "Elektronik"
        ],
        [
            "nama_barang" => "Jeruk",
            "harga" => 5000,
            "stok" => 20,
            "jenis" => "Buah"
        ],
        [
            "nama_barang" => "Kemeja",
            "harga" => 5000,
            "stok" => 9,
            "jenis" => "Pakaian"
        ],
        [
            "nama_barang" => "Apel",
            "harga" => 5000,
            "stok" => 5,
            "jenis" => "Buah"
        ],
        [
            "nama_barang" => "Celana",
            "harga" => 5000,
            "stok" => 10,
            "jenis" => "Pakaian"
        ],
        [
            "nama_barang" => "Laptop",
            "harga" => 50000,
            "stok" => 30,
            "jenis" => "Elektronik"
        ],
        [
            "nama_barang" => "Semangka",
            "harga" => 5000,
            "stok" => 2,
            "jenis" => "Buah"
        ],
        [
            "nama_barang" => "Kaos",
            "harga" => 5000,
            "stok" => 1,
            "jenis" => "Pakaian"
        ],
        [
            "nama_barang" => "VGA",
            "harga" => 2000000,
            "stok" => 0,
            "jenis" => "Elektronik"
        ]
    ];
    $jenisBarang = "";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET["jenisBarang"])){
            //huruf kapital
            $jenisBarang = $_GET["jenisBarang"];
        }
        echo "<table border=1>";
        echo "<tr>
                <th>nama_barang</th>
                <th>harga</th>
                <th>stok</th>
            </tr>";
        foreach ($datas as $data) {
            if($data["jenis"] == $jenisBarang){
                echo"<tr>
                <td>$data[nama_barang]</td>
                <td>$data[stok]</td>
                <td>$data[harga]</td>
                </tr>";
            }
        }
};
    ?>
</body>
</html>