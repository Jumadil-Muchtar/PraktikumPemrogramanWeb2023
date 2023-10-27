<?php
session_start();
// Periksa apakah ada permintaan logout
if (isset($_GET['logout'])) {
    if ($_SESSION['user_role'] === 'user') {
        // Hapus sesi dan arahkan ke halaman login
        $_SESSION['admin_logout'] = true;
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
}

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    if ($_SESSION['user_role'] === 'user') {
        $username = $_SESSION['username'];
        // Izinkan akses halaman user
        // Tambahkan kode halaman user di sini
    } else {
        // Pengguna dengan peran selain user tidak diizinkan mengakses halaman ini
        header("Location: index.php"); // Alihkan pengguna ke halaman admin
        exit();
    }
} else {
    // Pengguna yang belum login akan diarahkan ke halaman login
    header("Location: login.php");
    exit();
}
// Konfigurasi Koneksi
$host = "localhost";
$user = "root";
$pass = "";
$db = "tugas7";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak Bisa Terkoneksi Ke Database");
}
// --------------------------------

// Deklarasi Variabel Kosong
$nim = "";
$nama = "";
$alamat = "";
$fakultas = "";
$sukses = "";
$error = "";
// ----------------------------------

if (isset($_SESSION['admin_logout']) && $_SESSION['admin_logout'] === true) {
    if ($_SESSION['user_role'] === 'user') {
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: gray;
        }

        .container {
            background-color: #f2f2f2;
            padding: 5px;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            margin-top: 30px;
        }


        .card {
            margin-top: 10px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 1);
            margin: 30px;
            width: 100%
        }

        h1 {
            font-size: 30px;
            text-align: center;
            margin: 10px;
        }
    </style>
</head>

<body>
    <h1>
        Hello
        <?php echo $username ?> !
    </h1>
    <div class="container">

        <!------------------------------------------ READ DATA DI DATABASE ------------------------------------------>
        <div class="card">
            <div class="card-header text-white bg-secondary fw-bold">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>NIM</th>
                            <th scope='col'>Nama</th>
                            <th scope='col'>Alamat</th>
                            <th scope='col'>Fakultas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql12 = "SELECT * FROM data";
                        $q2 = mysqli_query($koneksi, $sql12);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id = $r2["id"];
                            $nim = $r2["nim"];
                            $nama = $r2["nama"];
                            $alamat = $r2["alamat"];
                            $fakultas = $r2["fakultas"];

                            ?>
                            <tr>
                                <th scope='row'>
                                    <?php echo $urut++ ?>
                                </th>
                                <td scope='row'>
                                    <?php echo $nim ?>
                                </td>
                                <td scope='row'>
                                    <?php echo $nama ?>
                                </td>
                                <td scope='row'>
                                    <?php echo $alamat ?>
                                </td>
                                <td scope='row'>
                                    <?php echo $fakultas ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="login.php?logout=1" class="btn btn-danger">Logout</a>
            </div>

        </div>
        <!--------------------------------------------------------------------------------------------------------------->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>