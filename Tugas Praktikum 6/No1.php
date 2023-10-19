<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No 1</title>
</head>
<body>

<form method="POST" action="">
    <input placeholder="Masukkan tipe" type="text" name="jenis_barang" id="jenis_barang">
    <input type="submit" name="submit" value="Submit">

</form>

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

    if (isset($_POST['jenis_barang'])) {
        $nama_jenis_barang = $_POST['jenis_barang'];
        
    
        $filter_data = array_filter($data, function ($item) use ($nama_jenis_barang) {
            return stristr($item['jenis'], $nama_jenis_barang);
        });
    
        echo "<table border='5'>";
        echo "<tr><th>Nama Barang</th><th>Harga</th><th>Stok</th></tr>";
        foreach ($filter_data as $barang) {
            echo "<tr>";
            echo "<td>" . $barang['nama_barang'] . "</td>";
            echo "<td>" . $barang['harga'] . "</td>";
            echo "<td>" . $barang['stok'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

 ?>   
</body>
</html>