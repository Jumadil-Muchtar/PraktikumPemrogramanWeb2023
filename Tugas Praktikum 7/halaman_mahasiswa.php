<?php
session_start();
$dibolehkan = false;
if ($_SESSION['role'] !== "mahasiswa") { 
    $dibolehkan = false;
    echo "Dilarang Masuk";
 
} else {
$dibolehkan = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Mahasiswa</title>
    <style>
  .center-text {
    text-align: center;
  }
</style>
</head>
<body>
    <?php
    if ($dibolehkan == true) {
        echo '
        <h1 class="center-text">Halaman Masuk</h1> <hr>

    <!-- Formulir Tampilkan Data Mahasiswa -->
    <form method="get">
        <a href="halaman_mahasiswa.php?aksi=tampil">Tampilkan Data Mahasiswa Yang Ada</a>
        <!-- <input type="hidden" name="aksi" value="tampil"> -->
        <!-- <button type="submit">Tampilkan Data Mahasiswa Yang Ada</button> -->
    </form>';

    ?>
   

</body>
</html>
<?php
$server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "db_mahasiswa";

// Fungsi Read (Select)
function ambilDataMahasiswa() {
    global $server, $db_username, $db_password, $db_name;
    // yang digunakan untuk mengakses variabel yang didefinisikan di luar fungsi.

    $conn = new mysqli($server, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql = "SELECT  id, Nama, NIM, Prodi FROM tb_mahasiswa";
    $result = $conn->query($sql);

    $data = array();
  

    if ($result->num_rows > 0) {
    //um_rows untuk menghitung jumlah baris yang dikembalikan oleh hasil kueri.
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
            //setiap bris dr hsil kueri row di tmbhkan ke dalam array data
        }
    }

    $conn->close();
    return $data;
}

// Menampilkan data dalam bentuk tabel HTML
function tampilkanTabelMahasiswa() { //untuk menampilkan data mahasiswa dalam bentuk tabel HTML.
    $dataMahasiswa = ambilDataMahasiswa(); //memanggil fungsi yg diatas 

    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Nama</th>';
    echo '<th>NIM</th>';
    echo '<th>Prodi</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($dataMahasiswa as $row) {
        echo '<tr>';
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['Nama']}</td>";
        echo "<td>{$row['NIM']}</td>";
        echo "<td>{$row['Prodi']}</td>";
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}

// Panggil fungsi untuk menampilkan tabel mahasiswa jika ada parameter aksi
if (isset($_GET['aksi']) && $_GET['aksi'] === 'tampil') {
    tampilkanTabelMahasiswa();
}
    }
?>