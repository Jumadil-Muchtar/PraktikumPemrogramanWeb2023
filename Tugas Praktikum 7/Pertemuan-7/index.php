<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

if (isset($_SESSION['role']) && $_SESSION['role'] != 'mahasiswa') {
	header('Location:index-admin.php');
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <div class="container-index">
        <a href="logout.php" id="logout">Logout</a>

        <h1>Daftar Mahasiswa</h1>


        <form action="" method="post">

            <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off" id="keyword">
            <button type="submit" name="cari" id="cari">Cari!</button>

        </form>

        <br>
        <table border="1" cellpadding="10" cellspacing="0">

            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>Program Studi</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["nim"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= $row["prodi"]; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>

        </table>
    </div>

</body>

</html>