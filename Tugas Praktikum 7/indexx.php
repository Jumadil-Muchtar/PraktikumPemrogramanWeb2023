<?php
session_start();
if(!isset($_SESSION["login"]) || !isset($_SESSION['rolemahasiswa'])){
  header("Location: login.php");
  exit;
}
//koneksi ke database
require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY nim");

//tombol cari ditekan
if (isset($_POST["cari"])) {
  $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page Admin</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,700;1,400&display=swap" rel="stylesheet">
  <!-- BoxIcon -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <style>
    * {
      font-family: 'poppins';
      text-decoration: none;
    }

    .add {
      text-decoration: none;
    }

    .add img {
      width: 25px;
    }

    .add a {
      color: green;
    }

    .title {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 2rem;

    }

    .table-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 1rem;
    }

    th {
      background-color: #4A9DEC;
    }

    th,
    td {
      padding: 10px;
    }

    .bx {
      font-size: 50px;
      color: #000;
    }

    .search {
      display: inline-block;
      position: relative;
      display: flex;
      flex-direction: row;
      

    }

    .search input[type="text"] {
      width: 400px;
      padding: 10px;
      border: none;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .search button[type="submit"] {
      background-color: #4e99e9;
      border: none;
      color: #fff;
      cursor: pointer;
      padding: 10px 20px;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      position: absolute;
      top: 0.3rem;
      right: 4rem;
      transition: .9s ease;
    }

    .search button[type="submit"]:hover {
      transform: scale(1.1);
      color: rgb(255, 255, 255);
      background-color: blue;
    }

    .search a i{
      color: #fff;
    }

  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar" style="background-color: #0C356A;">
    <div class="container-fluid">
      <a class="navbar-brand" style="color: #fff; font-weight:700">SIKULU</a>
      <form class="d-flex" role="search" action="" method="post">

          <div class="search">
            <input class="form-control me-2" type="text" name="keyword" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" name="cari" type="submit">Search</button>
            <a href="logout.php" onclick="return confirm('Apakah anda yakin?');"><i class='bx bx-log-out'></i></a>
          
        </div>
      </form>
    </div>
  </nav>

  <div class="title">
    <h1>Daftar Mahasiswa</h1>
  </div>

  <div class="table-container">

    <table class="table">
      <thead>
        <tr>
          <th scope="col" style="background-color:#4A9DEC;">No.</th>

          <th scope="col" style="padding: 10px 100px; background-color:#4A9DEC;">Nama</th>
          <th scope="col" style="padding: 10px 30px; background-color:#4A9DEC;">NIM</th>
          <th scope="col" style="padding: 10px 125px; background-color:#4A9DEC;">Fakultas</th>
          <th scope="col" style="background-color:#4A9DEC;">Program Studi</th>
        </tr>
      </thead>

      <tbody class="table-group-divider">
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
          <tr>
            <td scope="row"><?= $i ?></td>

            <td><?= $row["nama"] ?></td>
            <td><?= $row["nim"] ?></td>
            <td><?= $row["fakultas"] ?></td>
            <td><?= $row["jurusan"] ?></td>
            <?php $i++; ?>
          <?php endforeach; ?>
      </tbody>
    </table>
  </div>


  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>