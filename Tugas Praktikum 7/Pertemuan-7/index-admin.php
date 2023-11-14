<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

if (isset($_SESSION['role']) && $_SESSION['role'] != 'admin') {
	header('Location:index.php');
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
$user = query("SELECT * FROM user");

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
		<h3>Halo Admin !</h3>

		<a href="tambah.php" id="tambah">Tambah data mahasiswa</a>
		<br><br>

		<form action="" method="post">

			<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off" id="keyword">
			<button type="submit" name="cari" id="cari">Cari!</button>

		</form>

		<br>
		<table border="1" cellpadding="10" cellspacing="0">

			<tr>
				<th>No.</th>
				<th>Aksi</th>
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
					<td>
						<a href="ubah.php?id=<?= $row["id"]; ?>" id="ubah">Ubah</a>
						<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');" id="hapus">Hapus</a>
					</td>
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