<?php
$data = [
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


$jenis_barang = "";
$filtered_data = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jenis_barang = strtolower($_POST["jenis_barang"]); // strtolower() digunakan untuk mengubah nilai menjadi huruf kecil, sehingga memastikan perbandingan string nanti bersifat case-insensitive (tidak memperhatikan huruf besar atau kecil)

    $found = false;
    foreach ($data as $item) {
        if (strtolower($item["jenis"]) === $jenis_barang) { 
            $filtered_data[] = $item; // Jika jenis barang ditemukan dalam data, elemen saat ini ditambahkan ke array $filtered_data
            $found = true;
        }
    }
    if (!$found) {
        echo '<script>alert("Jenis barang tidak ditemukan dalam data.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Data Barang</h1>
    <form method="post">
        <label for="jenis_barang">Masukkan Jenis Barang:</label> <br>
        <input type="text" name="jenis_barang" value="<?= $jenis_barang ?>">
        <input type="submit" value="Submit">
    </form>

    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Stok</th>
            <th>Harga</th>
        </tr>
        <?php foreach ($filtered_data as $item): ?>
            <tr>
                <td>
                    <?= $item["nama_barang"]; ?>
                </td>
                <td>
                    <?= $item["stok"]; ?>
                </td>
                <td>
                    <?= $item["harga"]; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>