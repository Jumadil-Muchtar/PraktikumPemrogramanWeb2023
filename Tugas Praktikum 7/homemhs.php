<?php
require_once('config/base.php');
require_once('config/connection.php');
session_start();

if (!isset($_SESSION["login"])){
  header("Location: ". BASE_URL . "login.php");
  exit;
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <!-- <a href="logout.php">Logout</a> -->
    <!-- <p><a href="logout.php" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Logout</a></p>
    <button type="button" class="btn btn-danger mt-4 btn-logout">
      Log Out
    </button> -->
    <h3 class="text-center mt-4 mb-4">Data Mahasiswa</h3>
    <a href="logout.php" class="btn btn-danger mb-2 btn-logout">Logout</a>
    <!-- <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
      Tambah
    </button> -->
      <div class="card">
        <!-- <div class="card-header bg-primary text-white">
          Data Mahasiswa
        </div> -->
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <tr>
            <th class="table-secondary">No.</th>
            <th class="table-secondary">NIM</th>
            <th class="table-secondary">Nama Lengkap</th>
            <th class="table-secondary">Program Studi</th>
            <th class="table-secondary">Jenis Kelamin</th>
            <th class="table-secondary">Alamat</th>
            </tr>
              <?php

                //persiapan menampilkan data
                $no = 1;
                $tampil = mysqli_query($connection, "SELECT * FROM datamahasiswa ORDER BY nim");
                while ($data = mysqli_fetch_array($tampil)):
              ?>
                <tr>
                  <td>
                    <?= $no++ ?>
                  </td>
                  <td>
                    <?= $data['nim'] ?>
                  </td>
                  <td>
                    <?= $data['namaLengkap'] ?>
                  </td>
                  <td>
                    <?= $data['prodi'] ?>
                  </td>
                  <td>
                    <?= $data['jenisKelamin'] ?>
                  </td>
                  <td>
                    <?= $data['alamat'] ?>
                  </td>
                </tr>
                <?php endwhile; ?>
      </table>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script>
    document.querySelector(".btn-logout").addEventListener("click",  {
      // Mengarahkan pengguna kembali ke halaman login
    //  window.location.href = "login.php"; // Ganti "login.php" sesuai dengan alamat halaman login Anda
      <?= 
      session_unset();
      header("Location: " . BASE_URL . 'login.php'); ?>
    });
  </script>>
</body>
</html>