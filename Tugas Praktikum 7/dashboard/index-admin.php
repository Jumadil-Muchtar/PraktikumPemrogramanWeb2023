<?php
include("../config/Connection.php");
$connection = new Connection(); // mengelola koneksi ke database

$nama_admin = ""; // diinisialisasi kosong untuk menampung nama admin yang ditempatkan dalam sesi.

session_start();
$nama_admin = $_SESSION['nama'];

if ($_SESSION['status'] != 'login') { // memeriksa apakah pengguna sudah login atau belum 
    header("location:../index.php?message=Silahkan Login Terlebih Dahulu!");
} 

if ($_SESSION['role'] != 'admin') { // memeriksa peran pengguna dan memastikan bahwa peran tersebut adalah 'admin' 
    header("location:../index.php");
}

if (isset($_POST['logout'])) {
    session_destroy(); // menghapus semua data sesi yang telah disimpan selama sesi berjalan
    header("location:../index.php"); 
}

$success = "";
$error = "";

$nim = "";
$nama = "";
$prodi = "";

if (isset($_GET['op'])) { // memeriksa apakah parameter URL dengan nama 'op' ada atau tidak. 
    $op = $_GET['op']; // Jika parameter 'op' ada di dalam URL, nilai dari 'op' akan disalin ke variabel lokal $op. 
} else {
    $op = ""; // Jika parameter 'op' tidak ada di dalam URL (kondisi else), variabel $op diinisialisasi dengan nilai kosong ("")
}

// Edit
if ($op == 'edit') { // memeriksa apakah nilai dari variabel $op adalah 'edit'
    $id = $_GET['id']; // mengambil nilai parameter 'id' dari URL menggunakan variabel superglobal $_GET dan menyimpannya dalam variabel lokal $id
    $query = "SELECT * FROM users WHERE id = '$id'"; // membuat query SQL untuk mengambil data pengguna dari database berdasarkan ID yang diberikan
    $result = mysqli_query($connection->connect, $query); // menjalankan query ke database menggunakan objek koneksi MySQLi ($connection->connect) dan menyimpan hasilnya dalam variabel $result.
    $data = mysqli_fetch_assoc($result); // menggunakan fungsi mysqli_fetch_assoc() untuk mengambil hasil query sebagai array asosiatif ($data)

    if (!$data) { // memeriksa apakah data pengguna dengan ID yang diberikan ditemukan dalam database
        $error = "Data tidak ditemukan";
    } else { // Jika data ditemukan, nilai-nilai dari kolom 'username', 'nama', dan 'prodi' disalin ke variabel lokal $nim, $nama, dan $prodi masing-masing
        $nim = $data['username'];
        $nama = $data['nama'];
        $prodi = $data['prodi'];
    }
}

// Simpan
if (isset($_POST['simpan'])) { // memeriksa apakah formulir pengeditan telah disubmit
    $nim = $_POST['nim']; // mengambil nilai
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    if ($nim && $nama && $prodi) { // memeriksa apakah semua kolom formulir (NIM, nama, dan program studi) telah diisi
        if ($op == 'edit') { // memeriksa apakah operasi yang diminta adalah 'edit'
            $query = "UPDATE users SET username='$nim', nama='$nama', prodi='$prodi' WHERE id='$id'";
            $result = mysqli_query($connection->connect, $query);
            if ($result) {
                $success = "Data berhasil diperbarui";
            } else {
                $error = "Gagal memperbarui data";
            }
        }
    } else {
        $error = "Semua data harus diisi!";
    }
}

// Hapus
if ($op == 'delete') { // memeriksa apakah nilai dari variabel $op adalah 'delete'
    $id = $_GET['id']; // mengambil nilai parameter 'id' dari URL menggunakan variabel superglobal $_GET dan menyimpannya dalam variabel lokal $id
    $query = "DELETE FROM users WHERE id='$id'"; // membuat query SQL untuk menghapus data pengguna dari tabel 'users' berdasarkan ID yang diberikan.
    $result = mysqli_query($connection->connect, $query);
    if ($result) { // memeriksa apakah query berhasil dijalankan.
        $success = "Berhasil menghapus data";
    } else {
        $error = "Gagal menghapus data";
    }
}

// Tambah
if (isset($_POST['tambah'])) { //  memeriksa apakah formulir penambahan data pengguna telah disubmit
    $nim = $_POST['nim']; // engambil nilai dari elemen formulir (NIM, nama, dan program studi) yang telah disubmit melalui metode POST dan menyimpannya dalam variabel lokal
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    if ($nim && $nama && $prodi) { // memeriksa apakah semua kolom formulir (NIM, nama, dan program studi) telah diisi.
        $query = "INSERT INTO users (username, nama, prodi, role) VALUES ('$nim', '$nama', '$prodi', 'mahasiswa')"; // membuat query SQL untuk menambahkan data pengguna baru ke tabel 'users'
        $result = mysqli_query($connection->connect, $query);

        if ($result) {
            $success = "Data berhasil ditambahkan";
        } else {
            $error = "Gagal menambahkan data";
        }
    } else {
        $error = "Semua data harus diisi!";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 700px;
        }

        .card {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-4 mx-auto">

        <h3 class="text-center mb-5"><?= "Selamat Datang $nama_admin" ?></h3>

        <?php
        if (isset($_GET['message'])) {
            echo "<div class='alert alert-info' role='alert'>$_GET[message]</div>";
        }
        ?>

        <div class="card">
            <div class="card-header">
                Update Data Mahasiswa
            </div>
            <div class="card-body">
                <?php if ($error) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php
                    header("refresh:3;url=index-admin.php");
                }
                if ($success) { ?>
                    <div class="alert alert-success" role="alert">
                        <?= $success ?>
                    </div>
                <?php
                    header("refresh:3;url=index-admin.php");
                }
                if ($op != "" && $op == 'edit') { ?>
                    <form action="" method="post">
                        <div class="mb-3 row">
                            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nim" name="nim" value="<?= $nim ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="prodi" name="prodi" value="<?= $prodi ?>" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center gap-3">
                            <button type="submit" name="simpan" class="btn btn-primary">Update</button>
                            <a href="index-admin.php" class="btn btn-warning">Clear</a>
                        </div>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="collapse" data-bs-target="#tambahData">
                    Tambah Data
                </button>

                <div class="collapse" id="tambahData">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="prodi" class="form-label">Prodi</label>
                            <input type="text" class="form-control" id="prodi" name="prodi" required>
                        </div>
                        <div class="d-flex justify-content-center gap-3">
                            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                            <a href="index-admin.php" class="btn btn-warning">Batal</a>
                        </div>
                    </form>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM users WHERE role = 'mahasiswa'";
                        $result = mysqli_query($connection->connect, $query); //  menjalankan query ke database menggunakan objek koneksi MySQLi ($connection->connect) dan menyimpan hasilnya dalam variabel $result
                        $no = 1; // diinisialisasi dengan nilai 1. Variabel ini akan digunakan sebagai nomor urut ketika data pengguna ditampilkan.
                        while ($data = mysqli_fetch_assoc($result)) { // Setiap baris data diambil menggunakan fungsi mysqli_fetch_assoc(), dan nilai-nilai kolomnya disimpan dalam variabel $data dalam bentuk array asosiatif
                        ?>
                            <tr>
                                <td scope="row"><?= $no++ ?></td>
                                <td scope="row"><?= $data['nama'] ?></td>
                                <td scope="row"><?= $data['username'] ?></td>
                                <td scope="row"><?= $data['prodi'] ?></td>
                                <td scope="row">
                                    <a href="?op=edit&id=<?= $data['id'] ?>">
                                        <button type="button" class="btn btn-sm btn-warning">Edit</button>
                                    </a>
                                    <a href="?op=delete&id=<?= $data['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <button type="button" class="btn btn-sm btn-danger">Hapus</button>
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
    </div>

    <form action="" method="POST" class="position-fixed top-0 end-0 m-2">
        <button type="submit" name="logout" class="btn btn-lg btn-danger">Logout</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
