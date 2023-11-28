<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Mahasiswa</title>
    <!-- Tambahkan referensi Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <h1 class="mb-4">Halaman Mahasiswa</h1>   
    <!-- Tombol Log Out -->
    <form action="logout.php" method="post" class="mb-4">
        <button type="submit" class="btn btn-danger">Log Out</button>
    </form>

    <hr>

    <!-- Formulir Tampilkan Data Mahasiswa -->
    <form method="get">
        <input type="hidden" name="aksi" value="tampil">
        <button type="submit" class="btn btn-primary m-3">Tampilkan Data Mahasiswa</button>
    </form>

    <?php
    session_start();

    // Periksa apakah pengguna sudah login dan memiliki peran mahasiswa
    if (!isset($_SESSION["username"]) || $_SESSION["role"] !== "mahasiswa") {
        header("Location: login.php"); // Redirect ke halaman login jika belum login
        exit();
    }

    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "db_tugas";

    // Fungsi Read (Select)
    function ambilDataMahasiswa() {
        global $server, $db_username, $db_password, $db_name;

        $conn = new mysqli($server, $db_username, $db_password, $db_name);

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $sql = "SELECT  id, Nama, NIM, Prodi FROM tb_tugas";
        $result = $conn->query($sql);

        $data = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        $conn->close();
        return $data;
    }

    // Menampilkan data dalam bentuk tabel HTML dengan Bootstrap
    function tampilkanTabelMahasiswa() {
        $dataMahasiswa = ambilDataMahasiswa();

        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered table-hover">';
        echo '<thead class="thead-light">';
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
        echo '</div>';
    }

    // Panggil fungsi untuk menampilkan tabel mahasiswa jika ada parameter aksi
    if (isset($_GET['aksi']) && $_GET['aksi'] === 'tampil') {
        tampilkanTabelMahasiswa();
    }
    ?>
    <!-- Tambahkan referensi Bootstrap JS jika diperlukan -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
