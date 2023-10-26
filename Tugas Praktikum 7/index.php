<?php
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
// --------------------------------

// Untuk Lihat Operasi delete or edit ini variabel op didalam server 
if (isset($_GET["op"])) {
    $op = $_GET["op"];
} else {
    $op = "";
}

// Perkondisian if $op = 'delete'
if ($op == "delete") {
    $id = $_GET["id"];
    $sql1 = "DELETE FROM data WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil Menghapus Data";
    } else {
        $error = "Gagal Menghapus Data";
    }
}
// --------------------------------


// Perkondisian if $op = 'edit'
if ($op == "edit") {
    $id = $_GET["id"];
    $sql1 = "SELECT * FROM data WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1) {
        $r1 = mysqli_fetch_array($q1);

        // Periksa apakah ada hasil dari query
        if ($r1) {
            $nim = $r1['nim'];
            $nama = $r1['nama'];
            $alamat = $r1['alamat'];
            $fakultas = $r1['fakultas'];
        } else {
            $error = "Data Tidak Ditemukan";
        }
    } else {
        $error = "Terjadi kesalahan saat mengambil data.";
    }
}
// --------------------------------------------------------------------


// For Create Data Dan Update Data
if (isset($_POST["simpan"])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $fakultas = $_POST['fakultas'];

    // Memeriksa apakah data terisi semua
    if ($nim && $nama && $alamat && $fakultas) {
        // For Update Data
        if ($op == 'edit') {
            $sql1 = "UPDATE data SET nim = '$nim', nama = '$nama', alamat = '$alamat', fakultas = '$fakultas' WHERE id = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);

            if ($q1) {
                $sukses = "Data Berhasil Di Update";
            } else {
                $error = "Data Gagal Di Update";
            }
        } else {
            // For Create Data
            // Periksa apakah data dengan NIM yang sama sudah ada dalam database
            $check_sql = "SELECT nim FROM data WHERE nim = '$nim'";
            $result = mysqli_query($koneksi, $check_sql);

            if (mysqli_num_rows($result) > 0) {
                $error = "NIM Telah Terpakai";
            } else {
                $sql1 = "INSERT INTO data (nim, nama, alamat, fakultas) VALUES ('$nim', '$nama', '$alamat', '$fakultas')";
                $q1 = mysqli_query($koneksi, $sql1);

                if ($q1) {
                    $sukses = "Berhasil Memasukkan Data Baru";
                } else {
                    $error = "Gagal Memasukkan Data";
                }
            }
        }

    } else {
        $error = "Silahkan Isi Semua Data";
    }
}
// -----------------------------------------------------------------------------------------------------------------------------

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
        }
    </style>
</head>

<body>
    <div class="container">
        <!-------------------------------------------------- FORM ---------------------------------------------->
        <div class="card">
            <div class="card-header bg-info fw-bold">
                Buat / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                    echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                    header("refresh:3;url=index.php"); // 3 Detik Refresh 
                }
                ?>


                <?php
                if ($sukses) {
                    echo '<div class="alert alert-success" role="alert">' . $sukses . '</div>';
                    header("refresh:3;url=index.php"); // 3 Detik Refresh 
                
                }
                ?>
                <form action="" method="post">
                    <!-- FIELD DATA -->

                    <!-- Field Text Nim -->
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
                    </div>

                    <!-- Field Text Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                    </div>

                    <!-- Field Text Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                    </div>

                    <!-- Field Option Select Fakultas -->
                    <div class="mb-3">
                        <label for="fakultas" class="form-label">Fakultas</label>
                        <select class="form-control" name="fakultas" id="fakultas">
                            <option value="">- Pilih Fakultas -</option>
                            <!--  -->
                            <option value="FMIPA" <?php if ($fakultas == 'FMIPA')
                                echo "selected" ?>>FMIPA</option>
                                <!--  -->
                                <option value="FIB" <?php if ($fakultas == 'FIB')
                                echo "selected" ?>>FIB</option>
                                <!--  -->
                                <option value="FKM" <?php if ($fakultas == 'FKM')
                                echo "selected" ?>>FKM</option>
                                <!--  -->
                                <option value="FT" <?php if ($fakultas == 'FT')
                                echo "selected" ?>>FT</option>
                                <!--  -->
                                <option value="FKG" <?php if ($fakultas == 'FKG')
                                echo "selected" ?>>FKG</option>
                                <!--  -->
                                <option value="FK" <?php if ($fakultas == 'FK')
                                echo "selected" ?>>FK</option>
                                <!--  -->
                                <option value="FIKP" <?php if ($fakultas == 'FIKP')
                                echo "selected" ?>>FIKP</option>
                                <!--  -->
                            </select>
                        </div>

                        <!-- Button Simpan Data -->
                        <div class="col-12">
                            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
            <!------------------------------------------------------------------------------------------------------->

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
                                <th scope='col'>Aksi</th>
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
                                <td scope='row'>
                                    <a href="index.php?op=edit&id=<?php echo $id ?>"> <button type="button"
                                            class="btn btn-warning">Edit</button>
                                    </a>
                                    <a href="index.php?op=delete&id=<?php echo $id ?>"
                                        onclick="return confirm('Yakin Mau Delete Data?')"> <button type="button"
                                            class="btn btn-danger">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--------------------------------------------------------------------------------------------------------------->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>