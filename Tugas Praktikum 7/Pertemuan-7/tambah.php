<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index-admin.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index-admin.php';
			</script>
		";
	}


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
	<div class="container-tambah">
	<h1>Tambah Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nim">NIM : </label><br>
				<input type="text" name="nim" id="nim" placeholder="Masukkan NIM" required>
			</li>
			<li>
				<label for="nama">Nama : </label><br>
				<input type="text" name="nama" id="nama" placeholder="Masukkan Nama" required>
			</li>
			<li>
				<label for="email">Email :</label><br>
				<input type="text" name="email" id="email" placeholder="Masukkan Email" >
			</li>
			<li>
				<label for="prodi">Prodi :</label><br>
				<input type="text" name="prodi" id="prodi"  placeholder="Masukkan Prodi" required >
			</li>
			<li>
				<label for="gambar">Gambar :</label><br>
				<input type="file" name="gambar" id="gambar" >
			</li>
			<li>
				<button type="submit" name="submit" id="tambah">Tambah Data!</button>
			</li>
		</ul>

	</form>
	</div>

</body>
</html>