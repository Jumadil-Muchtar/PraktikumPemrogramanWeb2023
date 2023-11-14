<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="jenis_barang" placeholder="Masukkan tipe">
        <input type="submit" value="Submit">
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
        $jenis_barang = strtolower($_POST['jenis_barang']);

        $filteredData = array_filter($data, function($barang) use ($jenis_barang) {
        return strtolower($barang['jenis']) === $jenis_barang; 
        });

        if (count($filteredData) > 0) {
            echo "<table border='1'>";
            echo "<tr>
            <th>Nama</th>
            <th>Stok</th>
            <th>Harga</th>
            </tr>";

            foreach ($filteredData as $barang) {
                echo "<tr>";
                echo "<td>" . $barang['nama_barang'] . "</td>";
                echo "<td>" . $barang['stok'] . "</td>";
                echo "<td>" . $barang['harga'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";

        } else {
            echo "Tidak ada barang dengan jenis $jenis_barang.";
        }
    }
    ?>
</body>
</html>
