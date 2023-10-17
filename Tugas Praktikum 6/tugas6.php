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
    $jenis_barang = $_POST['jenis_barang'];
    $filtered_data = array_filter($data, function ($item) use ($jenis_barang) {
        return $item['jenis'] == $jenis_barang;
    });
} else {
    $filtered_data = $data;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Filter Data Barang</title>
</head>

<body>
    <h2>Tugas Praktikum 6 soal 1</h2>
    <h2>Filter Data Barang berdasarkan Jenis</h2>
    <form method="post">
        <label for="jenis_barang">Pilih Jenis Barang:</label>
        <select name="jenis_barang" id="jenis_barang">
            <option value="">Semua</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Buah">Buah</option>
            <option value="Pakaian">Pakaian</option>
        </select>
        <input type="submit" value="Filter">
    </form>

    <table border="1">
        <tr>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Jenis</th>
        </tr>
        <?php foreach ($filtered_data as $item): ?>
        <tr>
            <td><?php echo $item['nama_barang']; ?></td>
            <td><?php echo $item['harga']; ?></td>
            <td><?php echo $item['stok']; ?></td>
            <td><?php echo $item['jenis']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>