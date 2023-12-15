<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
</head>
<body>
    <h1>Data Barang</h1>
    <form method="post" action="">
        <label for="nama">Jenis Barang : </label> 
        <input type="text" id="nama" name="jenis_barang" ><br>
        <input type="submit" value="Tampilkan">
    </form>
    <?php
    $data = [
        [
            "nama" => "HP",
            "harga" => 3000000,
            "stok" => 10,
            "jenis_barang" => "Elektronik"
        ],
        [
            "nama" => "Jeruk",
            "harga" => 5000,
            "stok" => 20,
            "jenis_barang" => "Buah"
        ],
        [
             "nama" => "Kemeja",
             "harga" => 5000,
             "stok" => 9,
              "jenis_barang" => "Pakaian"
        ],
        [
            "nama" => "Apel",
            "harga" => 5000,
            "stok" => 5,
            "jenis_barang" => "Buah"
        ],
        [
            "nama" => "Celana",
            "harga" => 5000,
            "stok" => 10,
            "jenis_barang" => "Pakaian"
        ],
        [
            "nama" => "Laptop",
            "harga" => 50000,
            "stok" => 30,
            "jenis_barang" => "Elektronik"
        ],
        [
            "nama" => "Semangka",
            "harga" => 5000,
            "stok" => 2,
            "jenis_barang" => "Buah"
        ],
        [
            "nama" => "Kaos",
            "harga" => 5000,
            "stok" => 1,
            "jenis_barang" => "Pakaian"
        ],
        [
            "nama" => "VGA",
            "harga" => 2000000,
            "stok" => 0,
            "jenis_barang" => "Elektronik"
        ]
    ];
       
    if (isset($_POST['jenis_barang'])) { 
        $jenis_barang = $_POST['jenis_barang'];
        echo '<h2>Data Barang dengan Jenis: ' . $jenis_barang . '</h2>';
        echo '<table border="2">  
            <tr>
                <th>Nama</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>';

        foreach ($data as $barang) { //setiap elemen dari array akan disimpan dalam variabel $barang.
            if (strcasecmp($barang['jenis_barang'], $jenis_barang) === 0) {   
                echo '<tr>';  
                echo '<td>' . $barang['nama'] . '</td>';
                echo '<td>' . $barang['stok'] . '</td>';
                echo '<td>' . $barang['harga'] . '</td>';
                echo '</tr>';
            }
        }
        echo '</table>';
    }
    ?>
</body>
</html>