<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins';
        }

        body {
            background-color: gray;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        table {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 30);
        }
    </style>
    <title>Tabel Barang</title>
</head>

<body>
    <center>
        <form method="post">
            <input type="text" name="jenis_barang">
            <button type="submit">Cari</button>
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


        // Memeriksa apakah data jenis_barang sudah diget
        if (isset($_POST['jenis_barang'])) {
            $jenisBarangInput = $_POST['jenis_barang'];
            $jenisBarangInput = ucwords(strtolower($jenisBarangInput));

            // Membuat tabel HTML berdasarkan jenis yang dipost
            echo "<hr>";
            echo "<table border='3' cellspacing='0' cellpadding='3'>";
            echo "<tr><th>Nama Barang</th><th>Harga</th><th>Stok</th><th>Jenis</th></tr>";

            foreach ($data as $barang) {
                if ($barang['jenis'] == $jenisBarangInput) {
                    echo "<tr>";
                    echo "<td>" . $barang['nama_barang'] . "</td>";
                    echo "<td>" . $barang['harga'] . "</td>";
                    echo "<td>" . $barang['stok'] . "</td>";
                    echo "<td>" . $barang['jenis'] . "</td>";
                    echo "</tr>";
                }
            }

            echo "</table>";
        }
        ?>
    </center>
</body>

</html>